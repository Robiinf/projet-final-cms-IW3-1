<?php

function esgi_custom_comment_form_fields($fields) {
     // Réorganiser les champs en modifiant l'ordre
     if(isset($fields['cookies'])) {
         unset($fields['cookies']);
     }
     if(isset($fields['author'])) {
         unset($fields['author']);
     }
    if(isset($fields['email'])) {
        unset($fields['email']);
    }
    if(isset($fields['url'])) {
        unset($fields['url']);
    }

    
     // Utiliser des placeholders au lieu de labels
     $author_placeholder = 'Votre nom*';
     $email_placeholder = 'Votre adresse e-mail*';

     $fields['author'] = '<input id="author" name="author" type="text" placeholder="' . esc_attr($author_placeholder) . '" required />';
     $fields['email'] = '<input id="email" name="email" type="email" placeholder="' . esc_attr($email_placeholder) . '"  required />';

     

     
 
     return $fields;
}
add_filter('comment_form_default_fields', 'esgi_custom_comment_form_fields');

function custom_comment_textarea($field)
{
    $comment_placeholder = 'Votre commentaire*';
    $field = '<textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr($comment_placeholder) . '" required></textarea>';
    return $field;
}
add_filter('comment_form_field_comment', 'custom_comment_textarea');