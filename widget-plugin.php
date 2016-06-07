<?php
/*
Plugin Name: Call Rada service plugin
Description: Site specific code changes for bpotech.com.vn
Version: 0.1
Author: Phu TV
Author URI: http://bpotech.com.vn
License: GPLv2
*/
class Rada_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget_rada', // Base ID
			__( 'Call Rada Service', 'text_domain' ), // Name
			array( 'description' => __( 'A Rada Widget', 'text_domain' ), ) // Args
		);
	}

	public function getRegion()
	{
		return array(
			"889" =>"An Giang	",
			"590" =>"Bình Định	",
			"820" =>"Bình Dương	",
			"830" =>"Bình Phước	",
			"800" =>"Bình Thuận	",
			"790" =>"Bà Rịa - Vũng Tàu	",
			"260" =>"Bắc Cạn	",
			"230" =>"Bắc Giang	",
			"220" =>"Bắc Ninh	",
			"960" =>"Bạc Liêu	",
			"930" =>"Bến Tre	",
			"970" =>"Cà Mau	",
			"270" =>"Cao Bằng	",
			"900" =>"Cần Thơ	",
			"550" =>"Đà Nẵng	",
			"630" =>"Đắc Lắk	",
			"640" =>"Đắc Nông	",
			"810" =>"Đồng Nai	",
			"870" =>"Đồng Tháp	",
			"380" =>"Điện Biên	",
			"600" =>"Gia Lai	",
			"310" =>"Hà Giang	",
			"400" =>"Hà Nam	",
			"101" =>"Hà Nội	",
			"480" =>"Hà Tĩnh	",
			"170" =>"Hải Dương	",
			"180" =>"Hải Phòng	",
			"910" =>"Hậu Giang	",
			"160" =>"Hưng Yên	",
			"350" =>"Hòa Bình	",
			"650" =>"Khánh Hòa	",
			"920" =>"Kiên Giang	",
			"580" =>"Kon Tum	",
			"670" =>"Lâm Đồng	",
			"330" =>"Lào Cai	",
			"240" =>"Lạng Sơn	",
			"390" =>"Lai Châu	",
			"850" =>"Long An	",
			"420" =>"Nam Định	",
			"460" =>"Nghệ An	",
			"430" =>"Ninh Bình	",
			"660" =>"Ninh Thuận	",
			"290" =>"Phú Thọ	",
			"620" =>"Phú Yên	",
			"510" =>"Quảng Bình	",
			"560" =>"Quảng Nam	",
			"570" =>"Quảng Ngãi	",
			"200" =>"Quảng Ninh	",
			"520" =>"Quảng Trị	",
			"360" =>"Sơn La	",
			"950" =>"Sóc Trăng	",
			"840" =>"Tây Ninh	",
			"410" =>"Thái Bình	",
			"250" =>"Thái Nguyên	",
			"440" =>"Thanh Hóa	",
			"530" =>"Thừa Thiên Huế	",
			"860" =>"Tiền Giang	",
			"701" =>"Hồ Chí Minh	",
			"940" =>"Trà Vinh	",
			"300" =>"Tuyên Quang	",
			"890" =>"Vĩnh Long	",
			"280" =>"Vĩnh Phúc	",
			"320" =>"Yên Bái	",
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $args['before_title']
		. apply_filters( 'widget_title', $instance['title'] )
		. $args['after_title'];
		$form_action = get_bloginfo('url');
		$nonce = wp_create_nonce( $instance['securitycode'] );
		?>
			<form id="<?php echo $nonce; ?>" action="<?php echo admin_url('admin-ajax.php'); ?>?_wpnonce=<?php echo $nonce ?>" method="post" accept-charset="utf-8" class="call_rada">
				<p class="widget-control">
			    	<label for="<?php echo esc_attr( $this->get_field_id( 'Customer_name' ) ); ?>"><?php _e( esc_attr( 'Tên:' ) ); ?><span class="red">*</span></label>
			    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Customer_name' ) ); ?>" name="customer_name" value="" required placeholder="Nhập tên của bạn">
			    </p>
				<p class="widget-control">
			    	<label for="<?php echo esc_attr( $this->get_field_id( 'Message' ) ); ?>"><?php _e( esc_attr( 'Vấn đề:' ) ); ?><span class="red">*</span></label>
			    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Message' ) ); ?>" name="message" value="" required placeholder="Nhập vấn đề cần hỗ trợ">

			    </p>
			    <p class="widget-control">
			    	<label for="<?php echo esc_attr( $this->get_field_id( 'Customer' ) ); ?>"><?php _e( esc_attr( 'Số điện thoại:' ) ); ?><span class="red">*</span></label>
			    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Customer' ) ); ?>" name="customer" value="" required>
			    </p>
			    <p class="widget-control">
			    	<label for="<?php echo esc_attr( $this->get_field_id( 'Location' ) ); ?>"><?php _e( esc_attr( 'Địa chỉ:' ) ); ?><span class="red">*</span></label>
			    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Location' ) ); ?>" name="location" value="" required>
			    </p>
			    <p class="widget-control">
			    	<label for="<?php echo esc_attr( $this->get_field_id( 'Latitude' ) ); ?>"><?php _e( esc_attr( 'Lat:' ) ); ?></label>
			    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Latitude' ) ); ?>" name="lat" value="">
			    </p>
			    <p class="widget-control">
			    	<label for="<?php echo esc_attr( $this->get_field_id( 'Longitude' ) ); ?>"><?php _e( esc_attr( 'Long:' ) ); ?></label>
			    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Longitude' ) ); ?>" name="lng" value="">
			    </p>
			    <p class="widget-control">
			    	<label for="<?php echo esc_attr( $this->get_field_id( 'Region_code' ) ); ?>"><?php _e( esc_attr( 'Tỉnh:' ) ); ?></label>
			    	<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Region_code' ) ); ?>" name="region_code">
			    		<?php
			    			$region = $this->getRegion();
			    			if (count($region) > 0) {
			    				foreach ($region as $key => $reg) {
			    					?>
			    						<option value="<?php echo $key; ?>"><?php echo trim($reg); ?></option>
			    					<?php
			    				}
			    			}
			    		?>
			    	</select>
			    </p>
			    <div class="widget-control submit">
			    	<div class="error">
			    		<span class="status"></span>
			    	</div>
			    	<div class="recaptcha-error width80"><!-- BEGIN: ReCAPTCHA implementation example. --><div class="g-recaptcha" data-sitekey="<?php echo $instance['datasitekey']; ?>" data-callback="onSuccess"></div></div>
			    	<div class="sublit-button width20">
			    		<input type="submit" name="get-rada" class="btn btn-1 btn-1b button button-primary" value="Call">
			    	</div>
			    </div>
			    <input name="action" value="add_transfer" type="hidden">
			    <input type="hidden" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'apiurl' ) ); ?>" name="apiurl" value="<?php echo $instance['apiurl']; ?>">
			    <input type="hidden" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'securitycode' ) ); ?>" name="securitycode" value="<?php echo $instance['securitycode']; ?>">
				<input type="hidden" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'uid' ) ); ?>" name="uid" value="<?php echo $instance['uid']; ?>">
		    	<input type="hidden" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'apikey' ) ); ?>" name="apikey" value="<?php echo $instance['apikey']; ?>">
		    	<input type="hidden" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'serviceid' ) ); ?>" name="serviceid" value="<?php echo $instance['serviceid']; ?>">
		    	<input type="hidden" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'securitycode' ) ); ?>" name="securitycode" value="<?php echo $instance['securitycode']; ?>">
			</form>
			<style type="text/css" media="screen">

				form.call_rada{
					position: relative;
					border: thin solid #CCC;
                    padding: 10px;
				}

				form.call_rada .width75 {
				    width: 74%;
				    display: inline-block;
				}
				form.call_rada .width25 {
				    width: 24%;
				    display: inline-block;
				}
				form.call_rada .width80 {
				    width: 79%;
				    display: inline-block;
				}
				form.call_rada .width20 {
				    width: 19%;
				    display: inline-block;
				}
				form.call_rada .g-recaptcha {
				    float: right;
				}
				form.call_rada select.widefat{
					background: #f7f7f7;
				    background-image: -webkit-linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0));
				    border: 1px solid #d1d1d1;
				    border-radius: 2px;
				    color: #686868;
				    padding: 0.625em 0.4375em;
				    width: 100%;
				}
				form.call_rada .widget-control {
				    display: block;
				}
				form.call_rada .error{
					position: absolute;
					bottom: 5%;
				    width: 33%;
				    padding: 10px;
				    height: auto;
				}
				.status.active {
				    width: 100%;
				    text-align: center;
				    padding: 7px 17px 7px;
				    display: block;
				}
				.error>.status.active{
					background: aquamarine;
				}
				.red{
					color: red;
				}
				form.call_rada input.widefat, form.call_rada select.widefat{
					width: 65%;
					float: right;
				}
				form.call_rada input.widefat{
					padding-left: 8px;
				}
				form.call_rada .right{
					float: right;
				}
				form.call_rada .left{
					float: left;
				}
				form.call_rada .widget-control.submit{
					height: 80px;
				}
				form.call_rada input[type="submit"] {
				    float: right;
				    background-color: #A0CE4E;
				    padding: 5% 30% 5%;
				    text-align: center;
				    color: white;
				    font-weight: bolder;
				    text-transform: uppercase;
				}
			</style>
			<script>
				if (navigator.geolocation) {
				 	var timeoutVal = 10 * 1000 * 1000;
					navigator.geolocation.getCurrentPosition(
						displayPosition, 
					    displayError,
					    {
					    	enableHighAccuracy: true,
					    	timeout: timeoutVal,
					    	maximumAge: 0
					    }
					);
				}
				else {
					alert("Geolocation is not supported by this browser");
				}

				function displayPosition(position) {
					var form = jQuery('form.call_rada');
					form.find('input[name="lat"]').val(position.coords.latitude);
					form.find('input[name="lng"]').val(position.coords.longitude);
				}
				function displayError(error) {
					var errors = { 
					    1: 'Geo location permission denied',
					    2: 'Geo location position unavailable',
					    3: 'Geo location pequest timeout'
					};
					console.log("Error: " + errors[error.code]);
				}
			</script>
			<script type="text/javascript">
				var onSuccess = function(response) {
                    return true;
                };
				function isValid (value) {
					if( value ) {
						return true;
					}
					else{
						return false;
					}
				}
				jQuery(document).ready(function () {

					//setup before functions
					var typingTimer;                //timer identifier
					var doneTypingInterval = 5000;  //time in ms, 5 second for example
					var input = jQuery('form#<?php echo $nonce ?> input[name="location"]');

					//on keyup, start the countdown
					input.on('input', function () {
						clearTimeout(typingTimer);
						typingTimer = setTimeout(doneTyping(this), doneTypingInterval);
					});

					//on keydown, clear the countdown 
					input.on('keydown', function () {
					  	clearTimeout(typingTimer);
					});

					//user is "finished typing," do something
					function doneTyping (el) {
					  	//do something
					  	var addr = jQuery(el).val();
					  	var url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + addr + '&key=<?php echo $instance["geokey"] ?>';
					  	var form = jQuery(el).parents('form.call_rada');
					  	if (addr == '') {
					  		return true;
					  	};
					  	jQuery.get(
						  	url, {},
							function(data) {
								if (typeof data.results[0] != "undefined" && typeof data.results[0].geometry != "undefined") {
									var geo = data.results[0].geometry;
									form.find('input[name="lat"]').val(geo.location.lat);
									form.find('input[name="lng"]').val(geo.location.lng);
								};
							}
						);
					}

					jQuery('form#<?php echo $nonce ?>').submit(function (event) {
						event.preventDefault();
						response = grecaptcha.getResponse();
						if (!response) {
					        alert("Please fill the captcha!");
					        return false;
					    }
						var location = jQuery(this).find('input[name="location"]').val();
						var region_code = jQuery(this).find('input[name="region_code"]').val();
						var lat = jQuery(this).find('input[name="lat"]').val();
						var lng = jQuery(this).find('input[name="lng"]').val();
						if (!(isValid(location) || isValid(region_code) || (isValid(lat) && isValid(lng)))) {
							alert("Vui lòng nhập 1 trong các trường Region code, Longitude - Latitude, Location");
							return false;
						};
						var data = jQuery(this).serialize();
						var status = jQuery(this).find('.status');
						status.addClass('active').html('Đang gửi yêu cầu');
						jQuery.post(
						  jQuery(this).attr('action'), data,
							function(data) {
								var result = JSON.parse(data);
								status.addClass('active').html(result.message);
								setTimeout(function () {
									status.html('').removeClass('active');
								}, 5000);
							}
						);
					});
				});
			</script>
		<?php
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$defaults = array(
			'title' =>  __( 'Call Rada to book repair service for Home appliances', 'text_domain' ), 
                /**
                * apiurl: Your website link contain the module.
                */			
	        'apiurl' => 'http://bpotech.com.vn/cms/test/test.php',
                /**
                * uid & apikey: To get the id, you need to contact to Rada team to get your own ID.
                */	        
	        'apikey' => 'radaweb',
	        'uid' => 'xxx',
	        'serviceid' => '2',
	        'securitycode' => '8e2f79a80a7d06b531146a6c6b2793c4',
	        'datasitekey' => '6LeDkCETAAAAAGaYyeSwpj6cNwnPPMOmKmJ8k9xA',
	        'geokey' => 'AIAIzaSyAVoSt4yLktZxhg53xfU7vhT75tK-wKe3g',
	    );
		$title = ! empty( $instance['title'] ) ? $instance['title'] :$defaults['title'];
		$uid = ! empty( $instance['uid'] ) ? $instance['uid'] :$defaults['uid'];
		$serviceid = ! empty( $instance['serviceid'] ) ? $instance['serviceid'] :$defaults['serviceid'];
		$apikey = ! empty( $instance['apikey'] ) ? $instance['apikey'] :$defaults['apikey'];
		$apiurl = ! empty( $instance['apiurl'] ) ? $instance['apiurl'] :$defaults['apiurl'];
		$securitycode = ! empty( $instance['securitycode'] ) ? $instance['securitycode'] :$defaults['securitycode'];
		$datasitekey = ! empty( $instance['datasitekey'] ) ? $instance['datasitekey'] :$defaults['datasitekey'];
		$geokey = ! empty( $instance['geokey'] ) ? $instance['geokey'] :$defaults['geokey'];
		?>
		<p class="widget-control">
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p class="widget-control">
			<label for="<?php echo esc_attr( $this->get_field_id( 'apiurl' ) ); ?>"><?php _e( esc_attr( 'Api Url:' ) ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'apiurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'apiurl' ) ); ?>" value="<?php echo esc_attr( $apiurl ); ?>">
		</p>
		<p class="widget-control">
			<label for="<?php echo esc_attr( $this->get_field_id( 'uid' ) ); ?>"><?php _e( esc_attr( 'uid:' ) ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'uid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'uid' ) ); ?>" value="<?php echo esc_attr( $uid ); ?>">
		</p>
		<p class="widget-control">
			<label for="<?php echo esc_attr( $this->get_field_id( 'apikey' ) ); ?>"><?php _e( esc_attr( 'Api key:' ) ); ?></label>
	    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'apikey' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'apikey' ) ); ?>" value="<?php echo esc_attr( $apikey ); ?>">
		</p>
	    <p class="widget-control">
	    	<label for="<?php echo esc_attr( $this->get_field_id( 'serviceid' ) ); ?>"><?php _e( esc_attr( 'Service id:' ) ); ?></label>
	    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'serviceid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'serviceid' ) ); ?>" value="<?php echo esc_attr( $serviceid ); ?>">
		</p>
	    <p class="widget-control">
	    	<label for="<?php echo esc_attr( $this->get_field_id( 'securitycode' ) ); ?>"><?php _e( esc_attr( 'Security code:' ) ); ?></label>
	    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'securitycode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'securitycode' ) ); ?>" value="<?php echo esc_attr( $securitycode ); ?>">
	    </p>
	    <p class="widget-control">
	    	<label for="<?php echo esc_attr( $this->get_field_id( 'datasitekey' ) ); ?>"><?php _e( esc_attr( 'Recapcha key:' ) ); ?></label>
	    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'datasitekey' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'datasitekey' ) ); ?>" value="<?php echo esc_attr( $datasitekey ); ?>">
	    </p>
	    <p class="widget-control">
	    	<label for="<?php echo esc_attr( $this->get_field_id( 'geokey' ) ); ?>"><?php _e( esc_attr( 'Geolocation key:' ) ); ?></label>
	    	<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'geokey' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'geokey' ) ); ?>" value="<?php echo esc_attr( $geokey ); ?>">
	    </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance = $old_instance;
		if (count($new_instance)) {
			// start of the change
		    foreach ($new_instance as $key => $post_type) {
		      $instance[$key] = $post_type;
		    }
		}
	    // end of the change
	    return $instance;
	}

} // class Rada_Widget
function process_add_transfer() {

	$nonce = $_REQUEST['_wpnonce'];

	if ( ! wp_verify_nonce( $nonce, @$_POST['securitycode'] ) ) {

	    die( 'Security check' ); 

	} else {
		
	    if (isset($_POST['apiurl'])) {

	    	$url = $_POST['apiurl'];

	    	unset($_POST['apiurl']);

	    	$data = array(
	    		'message'=> (@$_POST['message']),
				'customer'=> (@$_POST['customer']),
				'lat'=> (@$_POST['lat']),
				'lng'=> (@$_POST['lng']),
				'location'=> (@$_POST['location']),
				'region_code'=> (@$_POST['region_code']),
				'uid' => (@$_POST['uid']),
				'api_key' => (@$_POST['apikey']),
				'service_id' => (@$_POST['serviceid'])
			);

			$response = wp_remote_post( $url, array(
	    			'timeout'       => 300,
	    			'body'			=> $data
    			)
	    	);

	    	if ( is_wp_error( $response ) ) {

			   	$error_message = $response->get_error_message();

			   	echo json_encode(array(
		    		'code' => 500,
		    		'message' => $error_message)
		    	);

			} else {

		    	$body = json_decode($response['body']);

		    	$code = @$body->status;

		    	$result['code'] = $code;

		    	$result['data'] = array();

				if ($code == 401) {

					$result['message'] = 'Sai uid hoặc apikey';

				}
				else if ($code == 400) {

					$result['message'] = 'Thiếu parameters hoặc sai format!';

				}
				else if ($code == 100) {

					$result['message'] = 'Service không hợp lệ!';

				}
				else if ($code == 101) {

					$result['message'] = 'Hệ thống chưa sẵn sàng tiếp nhận ngay, xin trở lại sau 1 phút nữa!';

				}
				else if ($code == 102) {

					$result['message'] = 'Không có SP khu vực bạn đặt!';

				}
				else if ($code == 200) {

					$result['message'] = 'Rada đã tiếp nhận thành công yêu cầu, thợ sẽ liên hệ với bạn sau ít phút nữa!';

				}
				else {

					if ($code == null) {

						$result['message'] = 'Thiếu tọa độ Lat - Long';

					}
					else {

						$result['message'] = 'Lỗi kết nối, đề nghị bạn trở lại sau ít phút hoặc liên hệ với chúng tôi nếu lỗi này lặp lại nhiều lần!';

					}

					$result['data'] = $response;

				}

			   	echo json_encode($result);

				exit();
			}

	    }
	    else {

	    	echo json_encode(array(
	    		'code' => 404,
	    		'message' => "Not allow GET method")
	    	);

	    }

	    exit();

	}

}

function process_get_geolocation()
{
	echo json_encode($_POST); exit();
}

// register Rada_Widget widget
function register_widget_rada() {

    register_widget( 'Rada_Widget' );

    add_action('wp_ajax_nopriv_add_transfer', 'process_add_transfer');

    add_action('wp_ajax_add_transfer', 'process_add_transfer');

    // Geolocation
    add_action('wp_ajax_nopriv_geolocation', 'process_get_geolocation');

    add_action('wp_ajax_geolocation', 'process_get_geolocation');

}

add_action( 'widgets_init', 'register_widget_rada' );

function form_creation($atts) {
	$defaults = array(
		'title' =>  __( 'Call Rada Service', 'text_domain' ), 
        'apiurl' => 'http://api.rada.asia/static/partner/create_request',
        'apikey' => 'radaweb',
        'uid' => '927',
        'serviceid' => '2',
        'securitycode' => time(),
        'datasitekey' => '6LeDkCETAAAAAGaYyeSwpj6cNwnPPMOmKmJ8k9xA',
        'geokey' => 'AIAIzaSyAVoSt4yLktZxhg53xfU7vhT75tK-wKe3g',
    );
	if ($atts) {
		$defaults = shortcode_atts(
			$defaults,
			$atts,
			'rada_service'
		);
		array_merge();
	}

	$rada = new Rada_Widget();

	return $rada->widget( null, $defaults );

}

add_action( 'widgets_init', 'register_widget_rada' );

add_shortcode('rada_service', 'form_creation');

function wpdocs_scripts_method() {

    wp_enqueue_script( 'recaptcha-api', 'https://www.google.com/recaptcha/api.js' );

}
add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );
