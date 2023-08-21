<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
//import model artikel
use App\Models\ArtikelModel;

class Artikel extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    use ResponseTrait;
    public function index()
    {
        //buat variable artikel
        $artikel = new ArtikelModel;

        //buat variable data dengan isi method GET all data
        $data = $artikel->findAll();

        //buat kondisi variable data memiliki data atau tidak
        if ($data) {
            return $this->respond($data);
        }
        else{
            return $this->respond('Data Tidak Ditemukan!');
        }

    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $i = 1;

        //buat variable model
        $model = new ArtikelModel;

        //buat variable checkId dengan isi method GET data berdasarkan id
        $checkId = $model->find($id);

        //buat variable artikel dimana jika pergi ke halaman detail maka akan menambah 1 views
        $artikel = $model->where('id', $id)->increment('view', $i);

        //buat kondisi variable checkId memiliki data atau tidak
        if ($checkId) {
            return $this->respond($checkId);
        }
        else{
            return $this->respond('Data Tidak Ditemukan!');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //buat variable json yang berisi request API
        $json = $this->request->getJSON();

        //buat variable data yang berisikan req.body API
        $data = [
            'judul' => $json->judul,
            'slug' => mb_url_title($json->judul, '-', TRUE),
            'penulis' => $json->penulis,
            'konten' => $json->konten,
            'tanggal_publikasi' => $json->tanggal_publikasi,
            'kategori' => $json->kategori,
            'view' => 0
        ];

        //buat variable model
        $model = new ArtikelModel;

        //buat variable artikel yang melakukan method POST data
        $artikel = $model->insert($data);

        //buat konidisi variable artikel untuk response API
        if ($artikel) {
            return $this->respondCreated($artikel);
        }
        else{
            return $this->fail('Gagal Tersimpan', 400);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //buat variable json yang berisi request API
        $json = $this->request->getJSON();

        //buat variable data yang berisikan req.body API
        $data = [
            'judul' => $json->judul,
            'slug' => mb_url_title($json->judul, '-', TRUE),
            'penulis' => $json->penulis,
            'konten' => $json->konten,
            'tanggal_publikasi' => $json->tanggal_publikasi,
            'kategori' => $json->kategori,
        ];

        //buat variable model
        $model = new ArtikelModel;

        //buat variable checkId untuk mencari data berdasarkan id variable model
        $checkId = $model->find($id);

        //buat konidisi variable checkId apabila menemukan data atau tidak
        if (!$checkId) {
            return $this->fail('Data Tidak Ditemukan', 404);
        }

        //buat variable artikel yang berisikan method PUT data
        $artikel = $model->update($id, $data);
        if ($artikel) {
            return $this->respond($artikel);
        }
        else{
            return $this->fail('Gagal Terupdate', 400);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {

        //buat variable model
        $model = new ArtikelModel;

        //buat variable checkId untuk mencari data berdasarkan id variable model
        $checkId = $model->find($id);

        //buat konidisi variable checkId apabila menemukan data atau tidak
        if (!$checkId) {
            return $this->fail('Data Tidak Ditemukan', 404);
        }

        //buat variable artikel yang berisikan method DELETE data
        $artikel = $model->delete($id);
        if ($artikel) {
            return $this->respondDeleted($artikel);
        }
        else{
            return $this->fail('Gagal Terhapus', 400);
        }
    }

}
