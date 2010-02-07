<?php
require_once(LIBS_DIR.'adodb/adodb.inc.php');

class DBConnect {
	private static $instance = null;
	private $db;

	private function __construct() {
		global $default;

		if(!isset($default->current_db)) {
			$db = $default->default_db;
		}
		else {
			$db = $default->current_db;
		}

		$this->db = ADONewConnection($default->db_driver[$db]);
		
		//$this->db->debug = true;
		$this->db->Connect(
			$default->db_host[$db],
			$default->db_user[$db],
			$default->db_pass[$db],
			$default->db_name[$db]
		);

		$this->db->SetFetchMode(ADODB_FETCH_ASSOC); 
	}
  
	static public function getInstance() {
		if ( is_null(self::$instance) ) {
			self::$instance = new DBConnect();
		}
		
		return self::$instance;
	}

	 
	function getUsers($page=1, $order=1, $nolimit=0) {
		if ($page == 1 || $page == '') {
			$lower = 0;
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		} else {
			$lower = APP_RECORD_PER_PAGE*($page-1);
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		}
		
		if($nolimit == 1) {
			$limit = '';
		}

		if($order == 3) {
			$orderby = ' ORDER BY user_type ASC';
		} elseif($order == 2) {
			$orderby = ' ORDER BY create_date DESC';
		} else {
			$orderby = ' ORDER BY create_date ASC';
		}

		$rs = $this->db->getAll("SELECT * FROM {$this->users_table} WHERE status!=2".$orderby.$limit);
		return $rs;
	}

	function getUserDetails($userId) {
		$details = $this->db->getRow("SELECT * FROM {$this->users_table} WHERE id=".$userId);
		return $details;
	}

			  
	function addUser($valArr = array()) {
		$res = $this->db->Execute("INSERT INTO users (username, password, user_type, access, status, create_date, last_modified_date) VALUES ('".$valArr['username']."', '".$valArr['password']."', '".$valArr['user_type']."', '".$valArr['access']."', '".$valArr['status']."', curdate(), curdate())");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function editUser($valArr = array()) {
		$res = $this->db->Execute("
			UPDATE 
				users SET 
				password			= '".$valArr['password']."', 
				user_type			= '".$valArr['user_type']."', 
				access				= '".$valArr['access']."', 
				status				= '".$valArr['status']."', 
				last_modified_date	= curdate()
			WHERE id = '".$valArr['userid']."'
		");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function delUser($userid) {
		$res = $this->db->Execute("UPDATE {$this->users_table} SET status = '2' WHERE id=".$userid);
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function getProcessDD() {
		$process = $this->db->getAll("SELECT id, name FROM {$this->process_table} WHERE status=1");
		$newArr = array();
		foreach($process as $p) {
			$newArr[$p['id']] = $p['name'];
		}
		return $newArr;
	}

	function getSubProcessDD($id) {
		$process = $this->db->getAll("SELECT id, name FROM {$this->sub_process_table} WHERE process_id = $id AND  status=1");
		$newArr = array();
		foreach($process as $p) {
			$newArr[$p['id']] = $p['name'];
		}
		return $newArr;
	}

	
	function getFunctionDD($id) {
		$process = $this->db->getAll("SELECT id, name FROM {$this->process_func_table} WHERE sub_process_id = $id AND  status=1");
		$newArr = array();
		foreach($process as $p) {
			$newArr[$p['id']] = $p['name'];
		}
		return $newArr;
	}

	function getProcess($page=1, $order=1, $nolimit=0) {
		if ($page == 1 || $page == '') {
			$lower = 0;
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		} else {
			$lower = APP_RECORD_PER_PAGE*($page-1);
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		}
		
		if($nolimit == 1) {
			$limit = '';
		}

		if($order == 3) {
			$orderby = ' ORDER BY name ASC';
		} elseif($order == 2) {
			$orderby = ' ORDER BY insert_date DESC';
		} else {
			$orderby = ' ORDER BY insert_date ASC';
		}

		$rs = $this->db->getAll("SELECT * FROM {$this->process_table} WHERE status!=2".$orderby.$limit);
		return $rs;
	}

	function getProcessDetails($processId) {
		$details = $this->db->getRow("SELECT * FROM {$this->process_table} WHERE id=".$processId);
		return $details;
	}

	function getSubProcessDetails($processId) {
		$details = $this->db->getRow("SELECT * FROM {$this->sub_process_table} WHERE id=".$processId);
		return $details;
	}
	
	function getProcessFuncDetails($processId) {
		$details = $this->db->getRow("SELECT * FROM {$this->process_func_table} WHERE id=".$processId);
		return $details;
	}

	
	function getAdminDataDetails($id) {
		$details = $this->db->getRow("SELECT * FROM {$this->admin_table} WHERE id=".$id);
		return $details;
	}

	
	function addProcess($valArr = array()) {
		$res = $this->db->Execute("INSERT INTO {$this->process_table} (name, description, status, insert_date, last_modified_date) VALUES ('".$valArr['name']."', '".$valArr['description']."', '".$valArr['status']."', curdate(), curdate())");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function editProcess($valArr = array()) {
		$res = $this->db->Execute("
			UPDATE 
				{$this->process_table} SET 
				name				= '".$valArr['name']."', 
				description			= '".$valArr['description']."', 
				status				= '".$valArr['status']."', 
				last_modified_date	= curdate()
			WHERE id = '".$valArr['processid']."'
		");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function delProcess($processId) {
		$res = $this->db->Execute("UPDATE {$this->process_table} SET status = '2' WHERE id=".$processId);
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function addSubProcess($valArr = array()) {
		$res = $this->db->Execute("INSERT INTO {$this->sub_process_table} (process_id, name, description, status, insert_date, last_modified_date) VALUES ('".$valArr['process_id']."', '".$valArr['name']."', '".$valArr['description']."', '".$valArr['status']."', curdate(), curdate())");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function editSubProcess($valArr = array()) {
		$res = $this->db->Execute("
			UPDATE 
				{$this->sub_process_table} SET
				process_id			= '".$valArr['process_id']."', 
				name				= '".$valArr['name']."', 
				description			= '".$valArr['description']."', 
				status				= '".$valArr['status']."', 
				last_modified_date	= curdate()
			WHERE id = '".$valArr['subProcessId']."'
		");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function delSubProcess($processId) {
		$res = $this->db->Execute("UPDATE {$this->sub_process_table} SET status = '2' WHERE id=".$processId);
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function getSubProcess($page=1, $order=1, $nolimit=0) {
		if ($page == 1 || $page == '') {
			$lower = 0;
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		} else {
			$lower = APP_RECORD_PER_PAGE*($page-1);
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		}
		
		if($nolimit == 1) {
			$limit = '';
		}

		if($order == 3) {
			$orderby = ' ORDER BY sub_process.name ASC';
		} elseif($order == 2) {
			$orderby = ' ORDER BY sub_process.insert_date DESC';
		} else {
			$orderby = ' ORDER BY sub_process.insert_date ASC';
		}
		
		$rs = $this->db->getAll("
			SELECT 
				sub_process.id, sub_process.name, process.name as process_name, sub_process.status 
			FROM 
				sub_process INNER JOIN process ON sub_process.process_id = process.id 
			WHERE 
				sub_process.status!=2".$orderby.$limit
		);
		
		return $rs;
	}

	function getProcessFunc($page=1, $order=1, $nolimit=0) {
		if ($page == 1 || $page == '') {
			$lower = 0;
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		} else {
			$lower = APP_RECORD_PER_PAGE*($page-1);
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		}
		
		if($nolimit == 1) {
			$limit = '';
		}

		if($order == 3) {
			$orderby = ' ORDER BY process_functions.name ASC';
		} elseif($order == 2) {
			$orderby = ' ORDER BY process_functions.insert_date DESC';
		} else {
			$orderby = ' ORDER BY process_functions.insert_date ASC';
		}
		
		$rs = $this->db->getAll("
			SELECT 
				process_functions.id, 
				process_functions.name, 
				sub_process.name as sub_process_name, 
				process.name as process_name, 
				process_functions.status 
			FROM 
				process_functions LEFT JOIN sub_process ON process_functions.sub_process_id = sub_process.id 
				LEFT JOIN process ON sub_process.process_id = process.id 
			WHERE 
				process_functions.status!=2".$orderby.$limit
		);
		
		return $rs;
	}

	function addProcessFunc($valArr = array()) {
		$res = $this->db->Execute("INSERT INTO {$this->process_func_table} (process_id, sub_process_id, name, description, status, insert_date, last_modified_date) VALUES ('".$valArr['process_id']."', '".$valArr['sub_process_id']."', '".$valArr['name']."', '".$valArr['description']."', '".$valArr['status']."', curdate(), curdate())");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function editProcessFunc($valArr = array()) {
		$res = $this->db->Execute("
			UPDATE 
				{$this->process_func_table} SET
				sub_process_id		= '".$valArr['sub_process_id']."',
				process_id			= '".$valArr['process_id']."', 
				name				= '".$valArr['name']."', 
				description			= '".$valArr['description']."', 
				status				= '".$valArr['status']."', 
				last_modified_date	= curdate() 
			WHERE id = '".$valArr['processFuncId']."'
		");
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function delProcessFunc($processFuncId) {
		$res = $this->db->Execute("UPDATE {$this->process_func_table} SET status = '2' WHERE id=".$processFuncId);
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function addAdminData($valArr = array()) {
		$sql = "
			INSERT INTO ".$this->admin_table." SET 
				process_id				= '".$valArr['process_id']."', 
				sub_process_id			= '".$valArr['sub_process_id']."', 
				function_id				= '".$valArr['function_id']."', 
				process_step			= '".$valArr['process_step']."', 
				process_step_type		= '".$valArr['process_step_type']."', 
				process_step_desc		= '".$valArr['process_step_desc']."', 
				input					= '".$valArr['input']."', 
				input_char				= '".$valArr['input_char']."', 
				processing_input_logic	= '".$valArr['processing_input_logic']."',
				assumption_process_step	= '".$valArr['assumption_process_step']."', 
				data_source_input		= '".$valArr['data_source_input']."', 
				output					= '".$valArr['output']."', 
				output_char				= '".$valArr['output_char']."', 
				output_logic			= '".$valArr['output_logic']."', 
				exceptions				= '".$valArr['exceptions']."',
				constraints_process_step= '".$valArr['constraints_process_step']."', 
				users					= '".$valArr['users']."', 
				measurement_plan		= '".$valArr['measurement_plan']."', 
				future_requirements		= '".$valArr['future_requirements']."', 
				segmentaion_rules		= '".$valArr['segmentaion_rules']."',
				entry_criteria			= '".$valArr['entry_criteria']."', 
				exit_criteria			= '".$valArr['exit_criteria']."',
				batch_processing		= '".$valArr['batch_processing']."', 
				screens					= '".$valArr['screens']."', 
				real_time_processing	= '".$valArr['real_time_processing']."', 
				upstream_process		= '".$valArr['upstream_process']."', 
				down_stream_process		= '".$valArr['down_stream_process']."',
				status_code				= '".$valArr['status_code']."',
				insert_date				= curdate(), 
				last_modified_date		= curdate() 
			 ";

		$res = $this->db->Execute($sql);
		if($res) {
			return true;
		} else {
			return false;
		}
	}
	
	function editAdminData($valArr = array()) {
		$sql	= "UPDATE ".$this->admin_table." SET 
						process_id				= '".$valArr['process_id']."', 
						sub_process_id			= '".$valArr['sub_process_id']."', 
						function_id				= '".$valArr['function_id']."', 
						process_step			= '".$valArr['process_step']."', 
						process_step_type		= '".$valArr['process_step_type']."', 
						process_step_desc		= '".$valArr['process_step_desc']."', 
						input					= '".$valArr['input']."', 
						input_char				= '".$valArr['input_char']."', 
						processing_input_logic	= '".$valArr['processing_input_logic']."',
						assumption_process_step	= '".$valArr['assumption_process_step']."', 
						data_source_input		= '".$valArr['data_source_input']."', 
						output					= '".$valArr['output']."', 
						output_char				= '".$valArr['output_char']."', 
						output_logic			= '".$valArr['output_logic']."', 
						exceptions				= '".$valArr['exceptions']."',
						constraints_process_step= '".$valArr['constraints_process_step']."', 
						users					= '".$valArr['users']."', 
						measurement_plan		= '".$valArr['measurement_plan']."', 
						future_requirements		= '".$valArr['future_requirements']."', 
						segmentaion_rules		= '".$valArr['segmentaion_rules']."',
						entry_criteria			= '".html_entity_decode($valArr['entry_criteria'])."', 
						exit_criteria			= '".$valArr['exit_criteria']."',
						batch_processing		= '".$valArr['batch_processing']."', 
						screens					= '".$valArr['screens']."', 
						real_time_processing	= '".$valArr['real_time_processing']."', 
						upstream_process		= '".$valArr['upstream_process']."', 
						down_stream_process		= '".$valArr['down_stream_process']."',
						status_code				= '".$valArr['status_code']."',
						insert_date				= curdate(), 
						last_modified_date		= curdate() 
					WHERE id				=	'".$valArr['id']."'
					";

		$res = $this->db->Execute($sql);
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	
	function getAdminData($page=1, $order=1, $nolimit=0) {
		if ($page == 1 || $page == '') {
			$lower = 0;
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		} else {
			$lower = APP_RECORD_PER_PAGE*($page-1);
			$limit= " LIMIT ".$lower.",".APP_RECORD_PER_PAGE;
		}
		
		if($nolimit == 1) {
			$limit = '';
		}

		if($order == 3) {
			$orderby = ' ORDER BY administration.process_step ASC';
		} elseif($order == 2) {
			$orderby = ' ORDER BY administration.insert_date DESC';
		} else {
			$orderby = ' ORDER BY administration.insert_date ASC';
		}
		
		$rs = $this->db->getAll("
			SELECT 
				administration.id, 
				administration.process_step, 
				sub_process.name as sub_process_name,
				process_functions.name as function_name,
				process.name as process_name
			FROM
				administration 
				LEFT JOIN process_functions ON administration.function_id = process_functions.id  
				LEFT JOIN sub_process ON process_functions.sub_process_id = sub_process.id 
				LEFT JOIN process ON sub_process.process_id = process.id 
			".$orderby.$limit
		);
		
		return $rs;
	}

	function searchAdminData($process_id, $sub_process_id, $function_id) {
		$whr = "WHERE 1=1 ";
		if($process_id !='') {
			$whr .= " AND administration.process_id = ".$process_id;
		}
		if($sub_process_id !='') {
			$whr .= " AND administration.sub_process_id = ".$sub_process_id;
		}
		if($function_id !='') {
			$whr .= " AND administration.functions.id = ".$function_id;
		}

		$sql = "SELECT 
				administration.*, 
				sub_process.name as sub_process_name,
				process_functions.name as function_name,
				process.name as process_name
			FROM
				administration 
				LEFT JOIN process_functions ON administration.function_id = process_functions.id  
				LEFT JOIN sub_process ON process_functions.sub_process_id = sub_process.id 
				LEFT JOIN process ON sub_process.process_id = process.id ".$whr;

		$rs = $this->db->getAll($sql);
		return $rs;
	}

	function checkUser($user_name, $user_pass, $user_type) {
		if($user_name == '' || $user_pass == '' || $user_type == '') {
			return 0;
		}

		$details = $this->db->getRow("SELECT * FROM {$this->users_table} WHERE username = '$user_name' AND password = '$user_pass' AND user_type = '$user_type'");
		
		if(count($details)>0) {
			return $details;
		} else {
		  return 0;		  
		}
	}

	  
	function getAllUsers() {
		$i = 0;
		$rs = $this->db->Execute("SELECT id,name FROM {$this->owl_users_table}");
		while (!$rs->EOF) {
			$users[$i][0] = $rs->fields['id'];
			$users[$i]['id'] = $rs->fields['id'];
			$users[$i][1] = $rs->fields['name'];
			$users[$i]['name'] = $rs->fields['name'];
			$rs->MoveNext();
			$i++;
		}

		return $users;
	}

	function changePassword($userId, $npassword) {
		$res = $this->db->Execute("UPDATE {$this->users_table} SET password = '$npassword' WHERE id=".$userId);
		if($res) {
			return true;
		} else {
			return false;
		}
	}

	function generatePageLink($record_count,$record_perpage,$url,$cur_page=1) {
		$total_record = $record_count;
		$currentPage = $cur_page;
		$recPerPage = $record_perpage;
		$previous_link = true;
		$next_link = true;
		$start_page = 1;
		$end_page = 0;
		$html = '';
		$totalPages = ceil((float)$total_record / (float)$recPerPage);
		
		if($total_record <= $recPerPage)
			return ;
		if($currentPage > $totalPages)
			return;
		
		if($currentPage == $totalPages)
			$next_link = false;
		if($currentPage == 1)
			$previous_link = false;

		if($totalPages >= 5 && ($currentPage > 2) && ($currentPage <= ($totalPages-2))) {
			$start_page = $currentPage - 2;
			$end_page = $currentPage + 2;
		} elseif($totalPages <= 5 ) {
			$start_page = 1;
			$end_page = $totalPages;
		}
		elseif($currentPage >= ($totalPages-2) && $totalPages > 5) {
			$end_page = $totalPages;
			$temp_page = $end_page - 4;
			$start_page = $temp_page > 0 ? $temp_page : 1;
		} else {
			$end_page = $totalPages;
			$temp_page = $end_page - $start_page;
			$end_page = $temp_page > 5? ($start_page + 4) : $end_page;
		}
		
		$prevpage = $currentPage - 1;
		$nextpage = $currentPage + 1;
		
		$html .= '<p class="links">';
		if($previous_link)
			$html .= '<a href="'.$url.'?page='.$prevpage.'" class="more">&lt;&lt; Previous</a>';

		for($i = $start_page; $i <= $end_page; $i++ ) {
			if($i == $currentPage)
				$html .= '&nbsp;&nbsp;<b><u>'.$i.'</u></b>';
			else
				$html .= '&nbsp;&nbsp;<a href="'.$url.'?page='.$i.'" class="redtext" title="paging '.$i.'" >'.$i.'</a>';
		}

		if($next_link)
			$html .= '&nbsp;&nbsp;<a href="'.$url.'?page='.$nextpage.'" class="more">Next &gt;&gt;</a>';
		
		$html .= '</p>';
		return $html;
	}

}
 
?>