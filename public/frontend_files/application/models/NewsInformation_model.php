<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH . 'models/GeneralData_model.php';
require_once APPPATH . 'libraries/entities/NewsInformationEntity.php';

class NewsInformation_model extends GeneralData_model
{

    public function __construct()
    {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllActiveNewsInformation()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
        $this->db->from('newsInformation AS n');
        $this->db->where('n.PublishDateTime <=', date('Y-m-d H:i:s'));
        $this->db->where('n.UnpublishedDateTime >=', date('Y-m-d H:i:s'));
        $this->db->where('n.IsActive', 1);
        $this->db->where('n.IsDeleted', 0);
        $this->db->order_by('PublishDateTime', 'desc');
        $this->db->limit(config_item('per_page_news_information_number'));
        $result = $this->db->get()->result_array();
        $news_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $temp = explode('-', $info['UnpublishedDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['UnpublishedDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';

            $news_information[$total++] = $info;
        }

        $this->db->select('n.ID');
        $this->db->from('newsInformation AS n');
        $this->db->where('n.IsActive', 1);
        $this->db->where('n.IsDeleted', 0);
        $result = $this->db->get()->result_array();
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($news_information, count($result));
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAllActiveNewsInformationhome()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
        $this->db->from('newsInformation AS n');
       $this->db->where('n.PublishDateTime <=', date('Y-m-d H:i:s'));
       $this->db->where('n.UnpublishedDateTime >=', date('Y-m-d H:i:s'));
        $this->db->where('n.IsActive', 1);
        $this->db->where('n.IsDeleted', 0);
        $this->db->order_by('PublishDateTime', 'desc');
        $this->db->limit(5);
        $result = $this->db->get()->result_array();
        if(count($result)<1)
        {
            $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
            $this->db->from('newsInformation AS n');
            $this->db->where('n.IsActive', 1);
            $this->db->where('n.IsDeleted', 0);
            $this->db->order_by('PublishDateTime', 'desc');
            $this->db->limit(5);
            $result = $this->db->get()->result_array();
        }

       
    

       
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $result;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getNewsInformationForFrontend()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
        $this->db->from('newsInformation AS n');
        $this->db->where('n.PublishDateTime <=', date('Y-m-d H:i:s'));
        $this->db->where('n.UnpublishedDateTime >=', date('Y-m-d H:i:s'));
        $this->db->where('n.IsActive', 1);
        $this->db->where('n.IsDeleted', 0);
        $this->db->order_by('PublishDateTime', 'desc');
        $this->db->limit(config_item('per_page_news_information_number'), ($page_no - 1) * config_item('per_page_news_information_number'));
        $result = $this->db->get()->result_array();
        $news_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $temp = explode('-', $info['UnpublishedDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['UnpublishedDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';

            $news_information[$total++] = $info;
        }
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $news_information;
    }

    public function getIndividualNewsDetail()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $news_id = $this->input->get('NewsID');
        $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
        $this->db->from('newsInformation AS n');
        $this->db->where('n.PublishDateTime <=', date('Y-m-d H:i:s'));
        $this->db->where('n.UnpublishedDateTime >=', date('Y-m-d H:i:s'));
        $this->db->where('n.ID', $news_id);
        $this->db->where('n.IsActive', 1);
        $this->db->where('n.IsDeleted', 0);
        $news_information = $this->db->get()->result_array();
        if (isset($news_information[0]['ID'])) {
            $news_information[0]['UnpublishedDateTime'] = substr($news_information[0]['UnpublishedDateTime'], 0, 10);
            $news_information[0]['PublishDateTime'] = substr($news_information[0]['PublishDateTime'], 0, 10);
            $temp = explode('-', $news_information[0]['UnpublishedDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $news_information[0]['UnpublishedDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $news_information[0]['PublishDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $news_information[0]['PublishDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';

            return $news_information[0];
        }
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $news_information;
    }

    public function createNewsInformation($userID)
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->require_fields = array('Title', 'Description');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['PublishDateTime'] = $this->input->post('PublishDate');
        $data['UnpublishedDateTime'] = $this->input->post('UnpublishedDate');
        $data['ImagePath'] = $this->input->post('NewsImagePath');
        $data['CreatedBy'] = $userID;
        $news_information_entity = new NewsInformationEntity($data);
        $news_information_data = $news_information_entity->getNewsEntityForCreate();

        if (empty($news_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' News Data: ' . print_r($data, true));
        if ($this->db->insert('newsInformation', $news_information_data)) {
            $news_id = $this->db->insert_id();
            if (isset($_FILES["NewsImagePath"]) && $_FILES["NewsImagePath"]['tmp_name']) {
                $upload_data = $this->util->upload('NewsImages', 'NewsImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $news_id);
                    if ($this->db->update('newsInformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteNews($news_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteNews($news_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllNewsInformation()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
        $this->db->from('newsInformation AS n');
        $this->db->where('n.IsDeleted', 0);
        $this->db->order_by('PublishDateTime', 'desc');
        $result = $this->db->get()->result_array();
        $news_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $news_information[$total++] = $info;
        }
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $news_information;
    }

    public function getNewsDetailInformation()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $news_id = $this->input->get('NewsID');
        if ($news_id) {
            $this->db->select('n.ID, n.Title, n.Description, n.ImagePath, n.PublishDateTime, n.UnpublishedDateTime, n.IsActive');
            $this->db->from('newsInformation AS n');
            $this->db->where('n.ID', $news_id);
            $this->db->where('n.IsDeleted', 0);
            $this->db->limit(1);
            $news_information = $this->db->get()->result_array();
            if (isset($news_information[0]['ID'])) {
                $news_information[0]['UnpublishedDateTime'] = substr($news_information[0]['UnpublishedDateTime'], 0, 10);
                $news_information[0]['UnpublishedDateTime'] = str_replace('-', '/', $news_information[0]['UnpublishedDateTime']);
                $news_information[0]['PublishDateTime'] = substr($news_information[0]['PublishDateTime'], 0, 10);
                $news_information[0]['PublishDateTime'] = str_replace('-', '/', $news_information[0]['PublishDateTime']);
                return $news_information[0];
            }
            return array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateNewsInformation($userID)
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $news_id = $this->input->get('NewsID');
        if (empty($news_id)) {
            return false;
        }

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['PublishDateTime'] = $this->input->post('PublishDate');
        $data['UnpublishedDateTime'] = $this->input->post('UnpublishedDate');
        $data['ImagePath'] = $this->input->post('NewsImagePath');
        $data['CreatedBy'] = $userID;

        $require_fields = array('Title', 'Description');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $news_information_entity = new NewsInformationEntity($data);

        $news_information_data = $news_information_entity->getNewsEntityForUpdate();

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        $this->db->set($news_information_data);
        $this->db->where('ID', $news_id);
        if ($this->db->update('newsInformation')) {
            if (isset($_FILES["NewsImagePath"]) && $_FILES["NewsImagePath"]['tmp_name']) {
                $upload_data = $this->util->upload('NewsImages', 'NewsImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $news_id);
                    if ($this->db->update('newsInformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteNews($news_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteNews($news_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
    }

    public function deleteNews()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $id = $this->input->get('NewsID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('newsInformation');

        return $return;
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
    }

    public function getNewsInformationForSidebar()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Title');
        $this->db->select('Description');
        $this->db->select('ImagePath');
        $this->db->from('newsInformation');
        $this->db->where('PublishDateTime <=', date("Y-m-d H:i:s"));
        $this->db->where('UnpublishedDateTime >=', date("Y-m-d H:i:s"));
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by('PublishDateTime', 'desc');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result = $this->db->get()->result_array();
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $result;
    }
}
