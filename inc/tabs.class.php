<?php

namespace tpp\model;


class Tabs implements \IteratorAggregate {

    protected $_tabs;

    function __construct() {
        $this->clear();
    }


    function __invoke($tab) {
        return $this->item($tab);
    }


    function is_empty() {
        return empty($this->_tabs);
    }


    function item($tab, Content $content = null) {
        if ( ! is_null($content)) {
            $c = $content;
            $this->_tabs[$tab] = new Tab($c->name, $c->title, $c->note, $c->index, $c->tab_type);
            return $this;
        } elseif (is_set($this->_tabs[$tab])) {
            return $this->_tabs[$tab];
        }
        return false;
    }


    function add(Content $content) {
        return $this->item($content->name, $content);
    }


    function sort() {
        // by user-defined index
        uasort($this->_tabs, function($a, $b) {
            $name1 = (empty($a->title)) ? $a->name : $a->title;
            $name1 = $a->index . $name1;
            $name2 = (empty($b->title)) ? $b->name : $b->title;
            $name2 = $b->index . $name2;
            return strcasecmp($name1, $name2);
        });
        return $this;   // chainable
    }


    function clear() {
        $this->_tabs = array();
        return $this;
    }


    function getIterator() {
        return new \ArrayIterator($this->_tabs);
    }
}



class Tab {

    /**
     * @var string  The file name of the Tab; used for display if Title is missing.
     */
    public $name = '';
    /**
     * @var string  The displayed title of the Tab.
     */
    public $title = '';
    /**
     *
     * @var string  Note for this Tab, used for tooltip text
     */
    public $note = '';
    /**
     * @var integer  The position of the Tab in the tab row.
     */
    public $index = 0;
    /**
     * @var enum    Type of the Tab: TAB_NORMAL, TAB_TRASH, TAB_ARCHIVE, TAB_NEW.
     */
    public $type = TAB_NORMAL;

    public $is_active = false;

    function __construct($name, $title, $note, $index, $type, $is_active = false) {
        $this->name = $name;
        $this->title = (empty($title)) ? $name : $title;
        $this->note = $note;
        $this->index = $index;
        $this->type = $type;
        $this->is_active = $is_active;
    }
}

