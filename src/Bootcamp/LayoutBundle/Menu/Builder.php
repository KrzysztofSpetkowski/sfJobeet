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
}
