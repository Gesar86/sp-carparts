<?
/**
 * Отзывы на сайте
 * 
 * - список отзывов,
 * - форма вопроса
 * 
 * @todo избавиться от лишнего кода
 * 
 * @package CMS
 * @author lanetz
 * @copyright 2013
 * @version $Id$
 * @access public
 */
class ReviewsModule extends ClientAccessModule
{

    /**
     *  Шаблон по умолчанию
     */
    //var $_tpl = 'review_list';

	//маска домена
    var $_domain_mask = false;//'(www.)?parts5.abc-nn.*'

	//ид темы по умолчанию
    var $themes_id = 1;

	//кол-во на странице
	var $limit_rows = 10;

    /**
     * ReviewsModule::Process()
     * 
     * @return void
     */
    function Process()
    {
        global $_SYSTEM,$__BUFFER;

        if($this->__loadMetaData()==true) return;

		//подключение скриптов/стилей
		$__BUFFER->addStyle('/_css/reviews.css');

        $this->xml_docs['back_url'] = $SYSTEM->URI;

        $this->xml_docs['form'] = $this->getForm($this->themes_id);
		
		
		$this->getQuestions($this->themes_id); //принудительно тема: общие вопросы $_REQUEST["id"]
		
		
		//---
		$this->xml_docs['page_title'] = $_SYSTEM->SITE_TITLE;
    }






    /**
     * Список тем для админки
     * 
     * @return
     */
    function AdminThemes()
    {
        global $_USER;

        $visible = array(
            "0" => "",
            "Y" => "Y",
            "N" => "N");

        $render = new HTML_DataRender();

        $tc = new TagCollection();

        $tableTag = &$tc->addTag("TABLE");

        $tableTag->addAttribute("cellpadding", "3");

        $tableTag->addAttribute("cellspacing", "1");

        $tableTag->addAttribute("class", "table");

        $tableTag->addAttribute("class", "admin_edit_table");

        $editProcess = new EditTableProcess("question_themes", $_USER['adapter'], $render);

        $editForm = &$editProcess->createEditForm("700px", $tc);

        $editForm->bindField(new TextBox("question_themes", ""), "темы вопросов");

        $columnsSet = array("тема вопросов" => "question_themes");

        $bindControl = &$editProcess->createEditTable($columnsSet, null, $tc);

        $this->_tpl = false;
        echo '<h1>Темы</h1>' . $editProcess->render();
        
        return true;

    }
    /**
     * список вопросов для админки
     * 
     * @return
     */
    function AdminQuestions()
    {
        global $_USER, $module;
        
        //$modulem = &$this;


        $visible = array( //"0" => "",
                "Y" => "Y", "N" => "N");

        $render = new HTML_DataRender();

        $tc = new TagCollection();

        $tableTag = &$tc->addTag("TABLE");

        $tableTag->addAttribute("cellpadding", "3");

        $tableTag->addAttribute("cellspacing", "1");

        $tableTag->addAttribute("class", "table");

        $tableTag->addAttribute("class", "admin_edit_table");

        //exit('ddd');
        $editProcess = new EditTableProcess("question", $_USER['adapter'], $render);
        

        $editForm = &$editProcess->createEditForm("700px", $tc);

        $editForm->bindField(new TextBox("mail", ""), "емайл");

        $editForm->bindField(new TextArea("text", "", 700, 80), "вопрос");

        $editForm->bindField(new DateTimeCalendar("date", "@REQUEST", "130px"),
            "дата вопроса");

        $editForm->bindField(new TextArea("reply_text", "", 700, 80), "ответ");

        $editForm->bindField(new DropDownList("visible", $visible), "публиковать");

        $editForm->bindField(new rsDropDownList("question_themes_id",
            "SELECT question_themes_id,question_themes FROM question_themes ORDER BY question_themes_id",
            $_USER['adapter']), 'Тема');
        //$editForm->bindField(new Hidden('question_themes_id'),$this->themes_id);

        $columnsSet = array(

            "емайл" => "mail",

            "вопрос" => "text",

            "ответ" => "reply_text",

            "публиковать" => "visible",

            "дата вопроса" => "date",

            "дата ответа" => "date_reply");

        $editTable = &$editProcess->createEditTable2_0($columnsSet, null, $tc);

        $editTable->addOrderField('date DESC');

        $old_precheck_handler = bind_new_func($editProcess->writeForm->dataCheckFunction, "checkUpdate");

        function checkUpdate(&$buffer)
        {

            global $__AR2, $_USER, $CONST, $_interface, $old_precheck_handler, $editForm, $editProcess,
                $render, $tc, $module;

            if ((!isset($_POST['date_reply'])) && ($_POST['reply_text'] != '')) {

                $_POST['date_reply'] = date('Y-m-d H:i:s');

            }

            $_POST['domain'] = $module->_domain_mask;

            $_POST['lng'] = 'ru';

            //echo'<pre>';print_r($_POST);echo'</pre>';

            if (!empty($old_precheck_handler))
                return safe_call_func_1ref($old_precheck_handler, $buffer);

            else
                return true;

        }

        $this->_tpl = false;
        echo '<h1>Вопросы</h1>';
        echo $editProcess->render();
        
        return true;
        //exit();
    }

    /**
     * ReviewsModule::getQuestions()
     * 
     * @return void
     */
    private function getQuestions($id)
    {

        global $_USER;
        
        $render = new HTML_DataRender();

        //**************************************************************************************

        //вывод сообщений или дерева тем

        //**************************************************************************************

        //      if (!empty($id))
        //    {

        $query = "

	SELECT 

		*,DATE_FORMAT(date,'%d.%m.%Y') as date_display
	FROM 

		`question`

     WHERE

			`visible` = 'Y' and question_themes_id = '" . $id . "'

			#думаю в данном проекте не нужен	
			#AND '" . $_SERVER['HTTP_HOST'] . "' REGEXP CONCAT('^', `domain`, '$')

			

     ORDER BY

     	date deSC

";

        //ed($query,true);

        $list = new PaginationControl($query, $_USER['adapter'], $this->limit_rows);

        $list->addSetting("caption", "<strong>страницы:</strong>");

        $data = $list->limitedResource();

        //$smarty->assign("list", $list->render($render));
        $this->xml_docs['list'] = $list->render($render);

        $qArray = array();

        while ($row = $_USER['adapter']->fetch_row_assoc($data)) {

            $qArray[] = $row;

        }

        //$smarty->assign("questions", $qArray);
        $this->xml_docs['questions'] = $qArray;

        $query2 = "	SELECT `question_themes` FROM `question_themes` WHERE `question_themes_id` = '" .
            $id . "' LIMIT 1 ";

        $res2 = $_USER["adapter"]->query($query2);

        $row2 = $_USER["adapter"]->fetch_row_assoc($res2);

        $themes = $row2["question_themes"];

        //$smarty->assign("questions_themes", $themes);
        $this->xml_docs['questions_themes'] = $themes;

        //$smarty->assign("request_id", (int)$_REQUEST["id"]);
        $this->xml_docs['request_id'] = $id;

    }

    /**
     * ReviewsModule::Form()
     * 
     * @return void
     */
    private function getForm($id)
    {

        require_once (__spellPATH("LIB:/human_check/lib.humancheck.php"));

        global $_USER, $client, $hc, $module;

        //__var_dump($client->cst_category_id);

        $hc = new HumanCheck();

        //$smarty = new MySmarty();

        $render = new HTML_DataRender();

        $form_process = new Process("form_process", $render);

        $formToDB = new FormToDatabase($_USER['adapter'], "question", 'check_data',
            'onSuccess', null);

        $this->xml_docs['form_show'] = "1";
        //$smarty->assign("form_show", "1");

        $hc->image_href = '/_phplib/human_check/';

        $module = $this;

        function onSuccess()
        {

            global $CONST, $module;

            $header = "FROM: " . $_REQUEST["mail"];

            notifyAdmin("Вопрос в фирму " . $CONST['project_name'], "<p>" . $_REQUEST["text"] .
                "</p>", $header);

            $module->xml_docs['form_show'] = 0;
            //$smarty->assign("form_show", "0");

            $module->xml_docs['submit'] = 1;
            //$smarty->assign("submit", "1");
            

        }

        function check_data()
        {

            global $hc, $smarty, $form_show, $module;

            $res = true;

            if (!$hc->check("hc_code")) {

                $module->xml_docs['submit'] = 0;
                //$smarty->assign("submit", "0");

                $module->xml_docs['form_show'] = 1;
                //$smarty->assign("form_show", "1");

                $module->xml_docs['hc_code'] = 1;
                //$smarty->assign("hc_code", "1");

                $res = false;

            }

            return $res;

        }

        //**************************************************************************************

        //форма

        //**************************************************************************************

        $form = new CustomForm("question", $_SERVER["REQUEST_URI"], "POST");

        $form->bindField(new TextArea("text", "@REQUEST", "500px", "100px"),
            "Ваш вопрос:", true);

        $form->bindField(new EmailTextBox("mail", "@REQUEST", '250px'), "E-mail:", true);

        $form->bindField(new TextBox("author", "@REQUEST", '250px'), "Ваше имя:", true);

        $form->bindField(new Hidden("date", date("Y-m-d H:m:s")));

        $domen = $this->_domain_mask;

        $form->bindField(new Hidden("domain", $domen));

        $form->bindField(new Hidden("lng", "ru"));

        $form->bindField(new ImageSubmit("submit", "/images/button_send.gif"));

        $form->bindField(new HumanCheckImage("hc_image"));

        $form->bindField(new TextBox("hc_code", "", "250px"),
            "введите цифры на изображении", true);

        $form->bindField(new Hidden("_prid", $form->instanceCount));

        $form->bindField(new Hidden("subj", get_class($formToDB) . $formToDB->
            instanceCount));

        $question_themes_id = $id;

        $form->bindField(new Hidden("question_themes_id", $question_themes_id));

        $form->bindField(new rsDropDownList("question_themes",
            "SELECT question_themes_id,question_themes FROM question_themes ORDER BY question_themes_id",
            $_USER['adapter']));

        $form->setStyle('

          

          <table cellpadding="5" id="form_review">
          

          <tr>

           <td valign="top" align="right">

          			<%FormControl:text@caption%>

          	</td>

          	<td>

          			<%FormControl:text%><br>

          		</td>

          </tr>

          <tr>

          		<td valign="top" align="right">

          		  <%FormControl:author@caption%>

          		 </td>

          		 <td>

          		<%FormControl:author%></td>

          	</tr>          

          <tr>

          		<td valign="top" align="right">

          		  <%FormControl:mail@caption%>

          		 </td>

          		 <td>

          		<%FormControl:mail%></td>

          	</tr>

          	

          	<tr>

          		<td valign="top" align="right"><%FormControl:hc_code@caption%></td>

               	<td><%FormControl:hc_code%><br><br><img class="thumbImage" vspace="10" src="/_phplib/human_check/hc_image.php?sid=' .
            session_id() . '"></td>

			</tr>

			

			<tr>

			  <td></td>

				<td>

					<input name="submit" type="submit" class="submitButton">

				</td>

			</tr>

          	

		</table>

		<%FormControl:date%>

		<%FormControl:domain%>

		<%FormControl:lng%>

		<%FormControl:question_themes_id%>

		<%FormControl:frm_ctr_id%>

		<%FormControl:_prid%>

		<%FormControl:subj%>

');

        //**************************************************************************************

        //

        //**************************************************************************************

        $formToDB->bindForm($form);

        $form_process->addState($form);

        $form_process->addState($formToDB);

        $form_process->render();

        //$smarty->assign("form", $form->render($render));
        return $form->render($render);

    }


	/**
	 * Принимаем параметры или применям метод
	 * 
	 * @return void
	 */
	function __loadMetaData(){
		global $_SYSTEM;
		$params = $_SYSTEM->META_DATA;
		
		if(count($params)>0){
			
			foreach($params as $k=>$param){
				
				if($k == 'ModuleMethod')
					if (method_exists($this,$param))
						return $this->$param();
					else
						die("error, method $param not exists");	
				elseif($k == 'ModuleName')
					continue;
				else{
					if(!empty($k) && isset($this->$k))
							$this->$k = $param;
				}
							
				
			}    
         
		}
        return false;    
	}

    
}
?>