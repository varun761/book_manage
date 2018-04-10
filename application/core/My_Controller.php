<?php
Class My_Controller extends CI_Controller{

  protected $js_file;
  protected $css_file;
  protected $data;
  public $CI;

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->CI=&get_instance();
    $this->js_file=array();
    $this->css_file=array();
    $this->data['meta_keywords']='Shop Categories, All Categories';
		$this->data['meta_description']="Odummy Store";
    $this->data['theme_folder']=$this->config->item('theme_folder');
    $this->data['active_theme']=$this->data['theme_folder'].'/'.$this->config->item('active_theme');
    $this->data['custom_css_path']=$this->config->base_url().$this->config->item('custom_css_path');
    $this->data['custom_js_path']=$this->config->base_url().$this->config->item('custom_js_path');
    $this->data['fontawesome_path']=$this->config->base_url().$this->config->item('fontawesome_path');
    $this->data['bootstrap_path']=$this->config->base_url().$this->config->item('bootstrap_path');
    $this->data['js_path']=$this->config->base_url().$this->config->item('js_path');

  }

  public function get_header(){
    $this->load->view($this->data['active_theme'].'/header',$this->data);
  }

  public function get_footer(){
    $this->load->view($this->data['active_theme'].'/footer',$this->data);
  }
  public function get_sidebar_menu(){
    $this->load->view($this->data['active_theme'].'/sidebar-menu',$this->data);
  }
  public function addJs(string $js,string $type='internal'){
    if($type=='internal'){
        $js=$this->data['js_path'].$js;
    }elseif($type=='custom'){
      $js=$this->data['custom_js_path'].$js;
    }
    array_push($this->js_file,$js);
  }

  public function addCss(string $css,string $type='internal'){
    if($type=='internal'){
        $css=$this->data['css_path'].$css;
    }elseif($type=='custom'){
        $css=$this->data['custom_css_path'].$css;
    }
    array_push($this->css_file,$css);
  }

  public function loadJs($html=null){
    if(!empty($this->js_file)){
      foreach($this->js_file as $val){
        $html.='<script type="text/javascript" src="'.$val.'"></script>';
      }
    }
    return $html;
  }

  public function loadCss($html=null){
    if(!empty($this->css_file)){
      foreach($this->css_file as $val){
        $html.='<link rel="stylesheet" href="'.$val.'">';
      }
    }
    return $html;
  }
}
?>
