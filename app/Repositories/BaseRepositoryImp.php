<?php
namespace App\Repositories;


interface BaseRepositoryImp
{
    public function create(array $attributes);
    public function update(array $attributes,  $id);
    public function delete( $id);
    public function findBy(array $data);
    public function all($columns = array('*'),  $orderBy = 'id',  $sortBy = 'desc');
    public function find( $id);
    public function findOneOrFail( $id);
    public function findOneBy(array $data);
    public function findOneByOrFail(array $data);
    public function paginateArrayResults(array $data,  $perPage = 50);

}
