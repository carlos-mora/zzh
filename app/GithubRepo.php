<?php

namespace App;

class GithubRepo
{
	public $url = 'https://api.github.com/orgs/symfony/repos';
    //
    public function getAll()
    {
	  	$curl = curl_init();
	  	curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	  	$data = curl_exec($curl);
	  	curl_close($curl);
    	return json_decode($data);
    }
}
