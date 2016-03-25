<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Ticket_model extends CI_Model
{
    public $id_ticket;
    public $nombre;
    public $correo;
    public $estado;
    public $categoria;
    public $id_sucursal;
    public $email_responsable;

    function __construct(){
      parent::__construct();
      $this->load->database();
    }

   public function cargar($datos){
      $this->id_ticket = $datos['id_ticket'];
      $this->nombre = $datos['nombre'];
      $this->correo = $datos['correo'];
      if(!empty($datos['estado'])){
         $this->estado = $datos['estado'];
      }
      else{
         $this->estado= "nuevo";
      }
      $this->categoria=$datos['categoria'];
      $this->id_sucursal=$datos['id_sucursal'];

      if(!empty($datos['email_responsable'])){
         $this->email_responsable=$datos['email_responsable'];
      }
      else{
         $this->email_responsable="";
      }

      return $this;
   }

   public function insertar(){
      $this->db->insert('ticket', $this);
   }

   public function consultar($id_ticket){
      $this->db->select("ticket.id_ticket,ticket.nombre,ticket.correo,ticket.estado,ticket.categoria,ticket.id_sucursal,ticket.email_responsable,observacion.tema,observacion.mensaje,observacion.fotografias");
      $this->db->from('ticket');
      $this->db->join('observacion', 'ticket.id_ticket=observacion.id_ticket WHERE ticket.id_ticket='. $id_ticket , "inner");
      $resultado= $this->db->get();
      $_respuesta=$resultado->row_array();
      if(!empty($_respuesta)){
         return $_respuesta;
      }
      else{
         return "No existe el ticket con el código: " . $id_ticket;
      }
   }
}
