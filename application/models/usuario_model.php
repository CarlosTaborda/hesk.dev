<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Usuario_model extends CI_Model
{
    public $id_usuario;
    public $nombre;
    public $correo;
    public $contrasena;
    public $rol;
    public $categoria;
    public $activo;

    function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function comprobarUsuario($data){
       $usuario = $data['correo'];
       $contrasena = sha1($data['contrasena']);

       $where = ['correo'=>$usuario, 'contrasena'=>$contrasena, 'activo'=>1];

       $this->db->select('nombre,correo,rol');
       $this->db->where($where);
       $_infoUsuario=$this->db->get('usuario')->row_array();

       if(!empty($_infoUsuario)){
         return $_infoUsuario;
       }
       else{
          return false;
       }
    }

    public function cargar($datos){
       $this->nombre=$datos['nombre'];
       $this->correo=$datos['correo'];
       $this->contrasena= sha1($datos['contrasena']);
       $this->rol=$datos['rol'];
       $this->categoria="";

       foreach($datos['categoria'] as $categoria){
         $this->categoria.=$categoria . " ";
       }

       if(!empty($datos['activo'])){
         $this->activo=$datos['activo'];
       }
       else{
          $this->activo=0;
       }

       return $this;
    }

   public function insertar(){
      $this->db->insert('usuario', $this);
   }

}

