<?php 
 echo $this->load->view('template/header', '', TRUE); //load header
 echo $this->load->view('template/navbar', '', TRUE);//load navbar
 echo $this->load->view($body, '', TRUE); //load dynamic content
 echo $this->load->view('template/footer', '', TRUE);//load footer
?> 