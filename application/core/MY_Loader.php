<?php
class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('template/head', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('template/footer', $vars, $return);
            return $content;
        else:
            $this->view('template/head', $vars);
            $this->view($template_name, $vars);
            $this->view('template/footer', $vars);
        endif;
    }
}
?>