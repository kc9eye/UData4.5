<?php
/**
 * Copyright (C) 2021 Paul W. Lane <kc9eye@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * 		http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * kc9eye\PHPViewWidgets\Templates
 */
namespace kc9eye\PHPViewWidgets\Templates {

    use kc9eye\PHPViewWidgets\Widgets\Options;
    use kc9eye\PHPViewWidgets\Widgets\UIContainer;

    /**
     * kc9eye\PHPViewWidgets\Widgets\BS4Body
     * 
     * Create a standard Bootstrap 4 body element. Contaning 
     * all the given widgets inside a fluid bootstrap conatiner. 
     * It also produces the required script elements to include the 
     * Bootstrap 4 library.
     */
    class BS4Body extends UIContainer {
        /**
        * Container constructor
        *
        * @param kc9eye\PHPViewWidgets\Widgets\Options $opts An optional Options class containing the options for the
        * the widget. This widget accepts the following Options: class,id,style,other
        * @param (kc9eye\PHPViewWidgets\Interfaces\Widget)[] $widgets An optional array of kc9eye\PHPViewWidgets\Widgets\ that will be unspooled inside the 
        * bs4 fluid container division.
         * @author Paul W. Lane
        */
        public function __construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts,$widgets);
        }

        /**
         * Returns the widget as a string
         * 
         * @return String
         */
        public function ToString() {
            $this->out .= "<body";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= "<div class='container-fluid'>";
            $this->unspoolContainer();
            $this->out .= "</div>";
            $this->out .= "<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>";
            $this->out .= "<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>";
            $this->out .= "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>";
            if (!empty($this->opts->scripts)) {
                foreach($this->opts->scripts as $script) {
                    $this->out .= $script->ToString();
                }
            }
            $this->out .= "</body>";
            return $this->out;
        }
    }
}