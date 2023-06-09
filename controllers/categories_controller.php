<?php
    class categories_controller extends main_controller {
        public function index() {
            $categories = categories_model::getInstance();
            $conditions = "path <> '0001'";
            $this->records = $categories->getAllRecords('*', ['conditions'=>$conditions]);
            $this->display();
        }
        public function view($id) {
            $categories = categories_model::getInstance();
            $record = $categories->getRecord($id);
            $this->setProperty('record',$record);
            $this->display();
        }

        public function add() {
            $categories = categories_model::getInstance();
            $this->records = $categories->getAllRecords();
            if(isset($_POST['btn_submit'])) {
                $categoriesData = $_POST['data'][$this->controller];
                
                // Path auto creament

                $conditions = "path LIKE '".$categoriesData['path']."%' 
                                AND path NOT LIKE '".$categoriesData['path']."%.%.%' ORDER BY path DESC LIMIT 1";
                $records = mysqli_fetch_array($categories->getAllRecords('*', ['conditions'=>$conditions]));
                if (strlen($records['path']) > strlen($categoriesData['path'])) {
                    if($categoriesData['path']) $categoriesData['path'] .= '.';
                    $categoriesData['path'] .=  '000'.(int)substr($records['path'],-1) + 1;
                }
                else {
                    $categoriesData['path'] .=  '.0001';
                }
                if(!empty($categoriesData['name']))  {
                    $categories = categories_model::getInstance();
                    if($categories->addRecord($categoriesData))
                        header( "Location: ".html_helpers::url(array('ctl'=>'categories')));
                }
            }
            $this->display();
        }

        public function edit($id) {
            $categories = categories_model::getInstance();
            $this->records = $categories->getAllRecords();
		    $record = $categories->getRecord($id);
            $oldPath = $record['path'];
            $this->setProperty('record',$record);
            if(isset($_POST['btn_submit'])) {
                $categoriesData = $_POST['data'][$this->controller];
                $conditions = "path LIKE '".$categoriesData['path']."%' 
                                AND path NOT LIKE '".$categoriesData['path']."%.%.%' ORDER BY path DESC LIMIT 1";
                $records = mysqli_fetch_array($categories->getAllRecords('*', ['conditions'=>$conditions]));
                if (strlen($records['path']) > strlen($categoriesData['path'])) {
                    if($categoriesData['path']) $categoriesData['path'] .= '.';
                    $categoriesData['path'] .=  '000'.(int)substr($records['path'],-1) + 1;
                }
                else {
                    $categoriesData['path'] .=  '.0001';
                }
                $newPath = $categoriesData['path'];
                if(!empty($categoriesData['name']))  {
                    if($categories->editRecord($id, $categoriesData)){
                        $categories->editPathChild($newPath, $oldPath);
                        header( "Location: ".html_helpers::url(array('ctl'=>'categories')));
                    }
			    }
		    }
		    $this->display();
        }
        
        public function del($id) {
            $path = $_POST['path_Product'];
            $categories = categories_model::getInstance();
            $categories->delRecord($path);
                //header( "Location: ".html_helpers::url(array('ctl'=>'categories')));
            // $this->display();
        }  
    }
?>