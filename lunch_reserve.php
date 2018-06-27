<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ignacio Arriagada
 * Date: 20-06-2018
 * Time: 12:20
 */

//NORMA DE SEGURIDAD DE PRESTASHOP

    if (!defined('_PS_VERSION_')){
        exit;
    }


class Lunch_Reserve extends Module{

 //INFO MODULE CONFIG.

        public function __construct()
        {

            $this->name = 'lunch_reserve';
            $this->tab = 'front_office_features';
            $this->version = '1.0.0';
            $this->bootstrap = true;
            $this->author = 'Ignacio Arriagada Ascencio';
            $this->ps_versions_compilancy = array('min'=>1.6, 'max'=>_PS_VERSION_);
            $this->displayName = 'Lunch Reserve System';
            $this->description = 'Reserva tu almuerzo a tu medida y cuando quieras';

            parent::__construct();


        }

        public function install(){

            if(parent::install()

                && $this->registerHook('displayHome')){

                return true;
            }

            return parent::install() && $this->installTab();

         // return false;

        }

        public function uninstall() {

        if(!parent::uninstall() ||
            //Borra la instalacion del modulo en la base de datos.
            !Configuration::deleteByName('URL_GITHUB_DEV')){
            return false;


        }else {

            return true;
        }

        return $this->uninstallTab() && parent::uninstall(); // TODO: Change the autogenerated stub
     }


    //Metodo de instalacion del modulo en el panel del administrador..

    public function installTab(){

        $tab = new Tab();
        $langs = language::getLanguages();
        foreach($langs as $lang) $tab->name[$lang['id_lang']] = 'Lunch Reserve';
        $tab->module = $this->name;
        $tab->id_parent = 0;
        $tab->class_name = 'LunchReserveAdmin';
        return $tab->save();

    }

    public function uninstallTab(){

         $id_tab = Tab::getIdFromClassName('LunchReserveAdmin');

         if($id_tab){

             $tab = new Tab($id_tab);
             return $tab->delete();
         }

       return true;
    }


    //Metodo para mostrar los template smart en ps...

    public function getContent(){

            if(Tools::isSubmit('subConfig')){

                $posturl = Tools::getValue('URLEj');
                Configuration::updateValue('URL_GITHUB_DEV', $posturl);
                $this->smarty->assign('save',true);
            }

            $urlvalue = Configuration::get('URLEj');
            $this->smarty->assign('urlvalue', $urlvalue);

        return $this->display(__FILE__,'front_user.tpl');
    }

    public function hookDisplayHome($params){

            if(Tools::isSubmit('subPedido')){


            }

        return $this->display(__FILE__, 'homeDisplay.tpl');

    }

    public function hookBackOfficeHeader($params){

            //global $smarty;
            return $this->display(__FILE__, 'admin_panel.tpl');
    }
}
