<?php
class Yelp {
    private $consumer;
	private $token;
	private $signature_method;
	private $unsignedURL = false;
	// Object Construction
	public function __construct($consumer_key, $consumer_secret, $token, $token_secret) {
		// OAuth library required for calling the API
		require_once('lib/OAuth.php');
		// Consumer object built using the OAuth library
		$this->consumer = new OAuthConsumer($consumer_key, $consumer_secret);
		// Token object built using the OAuth library
		$this->token = new OAuthToken($token, $token_secret);
		// Yelp uses HMAC SHA1 encoding
		$this->signature_method = new OAuthSignatureMethod_HMAC_SHA1();
	}
	// --- Setters
	// Generates the unsigned URL for our API call.
	public function setSearch($location, $terms, $limit = 10, $offset = 0) {
		// Location can be any type of search term. Zip, city, street address, etc.
		// Terms contains the search string of what you're looking for, like 'food', 'insurance agencies', 'department stores'. Can be an array.
		// If $terms is an array, convert it into a comma separated string
		if (is_array($terms)) {
			$terms = implode(",",$terms);
		}
		// If $terms or $location are empty, return false
		if (empty($location) || empty($terms)) {
			return false;
		}
		// If $limit is above 10, drop it back down.
		if ($limit > 10) {
			$limit = 10;
		}
		// Constructing the URL string.
		$url = "http://api.yelp.com/v2/search";
		$string = "location=$location&term=$terms&limit=$limit&offset=$offset&radius_filter=10000";
		$this->unsignedURL = $url."?".$string;
		return true;
	}

    //Search by Phone
    public function setSearchByPhone($phone, $category) {
        // Location can be any type of search term. Zip, city, street address, etc.
        // Terms contains the search string of what you're looking for, like 'food', 'insurance agencies', 'department stores'. Can be an array.
        // If $terms is an array, convert it into a comma separated string
        // Constructing the URL string.
        $url = "http://api.yelp.com/v2/phone_search";
        $string = "phone=$phone&category=$category";
        $this->unsignedURL = $url."?".$string;
        return true;
    }

    public function setSearchByPhone2($phone, $category) {
        // Location can be any type of search term. Zip, city, street address, etc.
        // Terms contains the search string of what you're looking for, like 'food', 'insurance agencies', 'department stores'. Can be an array.
        // If $terms is an array, convert it into a comma separated string
        // Constructing the URL string.
       // $url = "http://api.yelp.com/v2/phone_search";
      //  $url= "https://api.yelp.com/v3/businesses/search?";
      //  $string = "phone=$phone&category=$category";
      //  $this->unsignedURL = $url.$string;
       // return true;
    }

	// --- Getters
	public function getSearch($asArray = false) {
		// Bail out of no terms have been set yet.
		if (!$this->unsignedURL)
			return false;
		// Sign the URL with the API.
		$signed_url = $this->signURL($this->unsignedURL);
		// Send Yelp API Call
		$ch = curl_init($signed_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch); // Yelp response
		curl_close($ch);
		// Handle Yelp response data
		$response = json_decode($data, $asArray);
		return $response;
	}

	// Other functions
	private function signURL($unsigned_url) {
		// Build OAuth Request using the OAuth PHP library. Uses the consumer and token object created above.
		$oauthrequest = OAuthRequest::from_consumer_and_token($this->consumer, $this->token, 'GET', $unsigned_url);
		// Sign the request
		$oauthrequest->sign_request($this->signature_method, $this->consumer, $this->token);
		// Get the signed URL
		$signed_url = $oauthrequest->to_url();
		// Return the signed URL.
		return $signed_url;
	}
}
?>