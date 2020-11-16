<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Mprovinsi extends CI_Model
{

	private $client;
	public $apikey = 'testapikey';

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'http://localhost/restfull-api/api/'
		]);
	}

	public function tampil_provinsi()
	{
		
		$response = $this->client->request('GET', 'provinsi', [
			'query' => [
				'X-API-KEY' => $this->apikey
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'];
	}

	public function detail_provinsi($id)
	{
		
		$response = $this->client->request('GET', 'provinsi',
			['query' => [
				'X-API-KEY'=> $this->apikey,
				'id_provinsi' => $id
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'][0];
	}

	public function simpan_provinsi($input)
	{
		$nama = $this->input->post('provinsi');

		$data = [
			"nama_provinsi" => $nama,
			"X-API-KEY" => $this->apikey
		];

		$response = $this->client->request('POST', 'provinsi', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function update_provinsi($input, $id)
	{
		$nama = $this->input->post('provinsi');
		$data = [
			"nama_provinsi" => $nama,
			"id_provinsi" => $id,
			"X-API-KEY" => $this->apikey
		];

		$response = $this->client->request('PUT', 'provinsi', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapus_provinsi($id)
	{
		$result = $this->client->request('DELETE', 'provinsi',[
			'form_params' => [
				'X-API-KEY' => $this->apikey,
				'id_provinsi' => $id
			]
		]);

		return $result;
	}	
}	

/* End of file Mprovinsi.php */
/* Location: ./application/models/Mprovinsi.php */
