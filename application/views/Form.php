<?php
namespace views;

class Form {
            
    public function formbuilder(){
        $textarea = array(
                    'name'          => 'email',
                    'class'         => 'form-control',
                    'rows'          => 2,
                    'placeholder'   => 'Write a post ...'
        );
        $button = array(
                    'class' => 'ui positive button',
        );
        
        $form = array(
            'textarea' => $textarea,
            'button'   => $button
        );
        
        return $form;
    }
}
