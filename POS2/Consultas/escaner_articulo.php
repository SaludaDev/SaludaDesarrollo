<?php 


class Conexion{

    static public function conectar(){
        try {
            $db = new PDO("mysql:host=localhost;dbname=u155356178_DesarrolloSalu","u155356178_CorpoSaluda","SSalud4Dev2495#$",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $db;
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }
}



// Aquí va el resto de tu código para obtener el artículo

class Articulo_Controller extends CI_Controller {
	
	public function escaner_articulo() {
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_error('Solicitud no válida', 400);
		}
		
		$this->load->model('articulo_model');
		
		$codigo = $this->input->post('codigoEscaneado');
		
		if (empty($codigo)) {
			show_error('Código de artículo no válido', 400);
		}
		
		$data = $this->articulo_model->obtener_articulo_codigo($codigo);
		if (empty($data)) {
			show_error('No se encontró el artículo', 404);
		}
		
		echo json_encode($data);
	}
	
}

class Articulo_Model extends CI_Model {
	
	function obtener_articulo_codigo($codigo){
		$this->db->where('codigo', $codigo);
		$query = $this->db->get('articulos');

		return $query->row_array();
	}
	
}
?>
