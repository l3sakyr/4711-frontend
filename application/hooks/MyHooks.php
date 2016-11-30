<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MyHooks
{
    /**
     * This is the main function of the actual hook. It grabs the webpage
     * before it is displayed in a browser and modifies it.
     */
    function massage_data()
    {
        /* References the CI superobject to have access to the webpage. */
        $this->CI =& get_instance();
        $page = $this->CI->output->get_output();
        /* Creates a new DOMDocument and loads the HTML of the webpage. */
        $dom  = new DOMDocument();
        $dom->loadHTML($page);
        /* Gets a list of all the <p> HTML elements  and loops through them. */
        foreach($dom->getElementsByTagName('p') as $element)
        {
            /* If the class of the element is lead, it is modified. */
            if($element->getAttribute('class') == 'lead')
            {                
                $temp = $element->textContent;
                $sentence = $this->parse_content(explode(' ', $temp), $dom);
                $this->edit_elements($element, $sentence);
            }
        }
        echo $dom->saveHTML();
    }
    /**
     * Edit an HTML element by inserting new elements into it, whether they
     * are in example tags or bold tags.
     * 
     * @param DOMNode $element An HTML element to have new elements inserted
     * into it, to put capitalized words into a bold tag.
     * @param DOMElement[] $sentence A list of HTML elements to be inserted
     * into the original DOMNode.
     */
    function edit_elements($element, $sentence)
    {
        $element->nodeValue = '';
        foreach($sentence as $node)
        {
            /* Appends a new HTML element at the end of the old one. */
            $element->appendChild($node);
        }
    }
    /**
     * Takes in all the words in an HTML element. If any start with a capital
     * letter and are not a digit they are put into an HTML bold tag, and if
     * not, it is put into an example tag so there is no formatting on that
     * word.
     * 
     * @param string[] $words All of the words inside of an HTML element.
     * @param DOMDocument $dom The HTML code of the page.
     * @return DOMElement[] A list of HTML elements to be inserted
     * into the original DOMNode.
     */
    function parse_content($words, $dom)
    {
        $pattern = '/[a-zA-Z]{4}/';
        foreach($words as $word)
        {
            $node = $dom->createElement("example", $word . ' ');

            if(strlen($word)==4 && preg_match($pattern, $word))
            {
                $node = $dom->createElement("any", '****' . ' ');
            }
            $sentence[] = $node;
        }
        return $sentence;
    }
}