<?php

namespace Bootcamp\LayoutBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
       
        $menu->addChild('Strona główna', array
           ('route' => 'bootcamp_jobeet_homepage')
               );
        $menu->addChild('Ogłoszenia', array
           ('route' => 'bootcamp_jobeet_deals' )
               );
        $menu->addChild('Regulamin', array
           ('route' => 'bootcamp_panel_regulations' )
               );
   
    return $menu;
    }
    
    public function userMenuNotAuthenticated(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
        
        $menu->addChild('Zaloguj', ['uri' => '#'])
            ->setAttribute('class', 'dropdown')
            ->setLinkAttribute('class', 'dropdown-toggle')
            ->setLinkAttribute('data-toggle', 'dropdown')
            ->setChildrenAttribute('class', 'dropdown-menu');
        $menu['Zaloguj']->addChild('Zaloguj', [
            'route' => 'fos_user_security_login'
        ]);
        $menu['Zaloguj']->addChild('Zaloguj poprzez facebook', [
            'route' => 'facebook_login'
        ]);
        
        $menu->addChild('Zarejestruj', [
            'route' => 'fos_user_registration_register'
        ]);
        
    return $menu;
    }
}
