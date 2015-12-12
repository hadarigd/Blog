<?php
    class Base {
        public function initSession() {
            // is action=logout on a GET call, empty the session
            if (isset($_GET['action']) && $_GET['action'] === 'logout') {
                session_unset();
            }
            
            // by default I am not logged
            if (!isset($_SESSION['logged'])) {
                $_SESSION['logged'] = false; 
                $_SESSION['username']="";
            }
        }

        /*
        function render($data, $view) {
            $view = file_get_contents($view);
            if (count($data) > 0) {
            foreach ($data as $key=>$value) {
                if ($data[$key] != 'articles') {
                $view = str_replace("{{" . $key . "}}", $data[$key], $view);}
                }
            }
            echo $view;
        }
        */
        public function render2($data, $page) {

            // first load the view
            $template = file_get_contents(VIEWS . $page);
            
            // check for loops first
            $template = $this->renderForEach($template, $data);
            
            // then check for simple items
            $template = $this->renderSimple($template, $data);
            
            return $template;
        }
        
        private function renderForEach($template, $data) {
            // foreach
            preg_match_all ('/{{\s*foreach ([a-z]+)\s*}}(.*?){{\s*endforeach\s*}}/s', $template, $results);
            
            if (count($results[0]) > 0) {
                
                $i = 0;
                foreach ($results[0] as $occurence) {
                 
                 $rendered = "";
                 
                 $pattern = $results[0][$i];
                 $arrayName = $results[1][$i];
                 $block = $results[2][$i]; 
                
                  foreach ($data[$arrayName] as $elem) {
                     $rendered .= $this->renderSimple($block, $elem);
                 }
                 
                 $template = str_replace($pattern, $rendered, $template);
                 
                 $i++;
                }
            }
            
            return $template;    
        }
        
        private function renderSimple($template, $data) {
            //var_dump($data); 
            preg_match_all ( '({{[_a-zA-Z0-9]*}})',  $template,  $results); //(pattern to search for, where to search, array of all matches)
            if (count($results[0]) > 0) {
                foreach ($results[0] as $placeholder) { 
                    $key = str_replace('{{', '', $placeholder); // replace the {{ with " " in the placehoder (the text inside {{}} from the views pages) =>erase {{
                    $key = str_replace('}}', '', $key); // => erase }} ; $key = $placeholder without {}
                    if (!array_key_exists($key, $data)) {
                        error_log("key $key does not exist");
                        $data[$key] = "";
                    }
                    $template = str_replace($placeholder, $data[$key], $template); 
                }
            }
            
            // then check for conditions
            $template = $this->renderConditions($template, $data);
            
            return $template;
        }
        
        private function renderConditions($template, $data) {
            // look for block placeholders like {{ if boolean }} html code {{ else}} other html code {{ endif }}
            preg_match_all ( '/{{\s*if\s([a-zA-Z]*)\s}}(.*){{\s*else\s}}(.*){{ endif }}/s', $template, $results);
            
            if (count($results[0]) > 0) {
                //var_dump($results); die;
                $pattern = $results[0][0]; // => $pattern = {{ if isLogged }} TEST {{ endif }}
                // echo '<pre>';
                // print_r($pattern);
                $key = $results[1][0]; // => $key = isLogged
                // echo '<pre>';
                // print_r($key);
                $content = $results[2][0]; // => $content = 'you are logged'
                // echo '<pre>';
                // print_r($content);
                $alt_content = $results[3][0]; // => $alt_content = 'you are not logged'
                // echo '<pre>';
                // print_r($alt_content);
                
                if (array_key_exists($key, $data) && $data[$key]) {
                 $template = str_replace($pattern, $content, $template); 
                } else {
                 $template = str_replace($pattern, $alt_content, $template);  
                }
            }
            
            return $template;
        }
    }
?>
