<?php

namespace Drupal\testForm\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class createForm extends FormBase{

  /**
   * {@inheritdoc}
   */

   public function getFormId(){
     return 'drupal_simple_form';
   }

    /**
   * {@inheritdoc}
   */

   public function buildForm(array $form, FormStateInterface $form_state){
     $form['field_1'] = [
       '#type' => 'textfield',
       '#title' => $this->t('First field'),
     ];

     $form['field_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Second field'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Calculate'),
    ];

    $form['check_box'] = [
      '#type' => 'checkboxes',
      '#title' => t('Список чекбоксов'),
      '#options' => [
        '0' => t('Первый чекбокс'),
        '1' => t('Второй чекбокс'),
        '2' => t('Третий чекбокс'),
        '3' => t('Четвертый чекбокс'),
      ],
    ];

    $form['radio_button'] = [
      '#type' => 'radios',
      '#title' => t('Радиокнопки'),
      '#options' => [
        '0' => t('Первая радиокнопка'),
        '1' => t('Вторая радиокнопка'),
        '2' => t('Третья радиокнопка'),
        '3' => t('Четвертая радиокнопка'),
      ],
    ];

    $form['field_select'] = [
      '#type' => 'select',                                  // тип элемента формы
      '#title' => t('Селект'),                              // заголовок для селекта
      '#options' => [                                  // массив со списком option для селекта
        '0' => t('Первый селект'),
        '1' => t('Второй селект'),
        '2' => t('Третий селект'),
        '3' => t('Четвертый селект'),
        '4' => t('Пятый селект'),
    ],
    ];

    $form['field_set'] =[
      '#type' => 'fieldset',
      '#title' => t('Группа полей'),
      //'#collabsible' => TRUE,
      //'#collapsed' => TRUE,
    ];

    $form['field_set']['one'] =[
      '#type' => 'textarea',
      '#title' => t('Текстовое поле'),
    ];

    $form['field_set']['two'] =[
      '#type' => 'date',
      '#title' => t('Дата'),
    ];

    $form['field_set']['tree'] =[
      '#type' => 'password',
      '#title' => t('Пароль'),
    ];
 
    $form['file_new'] = [
      '#type' => 'file',
      '#title' => $this->t('FILE'),
      '#description' => t('Описание файлового поля'),
    ];

    
    $header = array(                                              // список значений для thead
      'name' => 'Имя',
      'family' => 'Фамилия',
    );
 
    $options = array(                                             // список значений для tbody
      0 => array(
        'name' => t('Павел'),
        'family' => t('Китаев'),
      ),
      1 => array(
        'name' => t('Мария'),
        'family' => t('Китаев'),
      ),
    );
    $form['field_tableselect'] = array(
      '#type' => 'tableselect',
      '#header' => $header,
      '#options' => $options,
      '#empty' => t('Не существует'),                             // значение по у молчанию, если в $options пусто
    );

    return $form;
   }

   /**
   * {@inheritdoc}
   */

   public function submitForm(array &$form, FormStateInterface $form_state){
     drupal_set_message($form_state->getValue('field_1') + $form_state->getValue('field_2'));
   }
}