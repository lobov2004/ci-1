<?php
/**
 * Intenso Premium Theme
 * 
 * @category    Itactica
 * @package     Itactica_LogoSlider
 * @copyright   Copyright (c) 2014 Itactica (http://www.itactica.com)
 * @license     http://getintenso.com/license
 */

class Itactica_LogoSlider_Block_Adminhtml_Logo_Edit_Tab_Stores extends Mage_Adminhtml_Block_Widget_Form 
{
    /**
     * prepare the form
     * @access protected
     * @return Itactica_LogoSlider_Block_Adminhtml_Logo_Edit_Tab_Stores
     */
    protected function _prepareForm(){
        $form = new Varien_Data_Form();
        $form->setFieldNameSuffix('logo');
        $this->setForm($form);
        $fieldset = $form->addFieldset('logo_stores_form', array('legend'=>Mage::helper('itactica_logoslider')->__('Store views')));
        $field = $fieldset->addField('store_id', 'multiselect', array(
            'name'  => 'stores[]',
            'label' => Mage::helper('itactica_logoslider')->__('Store Views'),
            'title' => Mage::helper('itactica_logoslider')->__('Store Views'),
            'required'  => true,
            'values'=> Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
        ));
        $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
        $field->setRenderer($renderer);
          $form->addValues(Mage::registry('current_logo')->getData());
        return parent::_prepareForm();
    }
}