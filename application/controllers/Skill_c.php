<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill_c extends CI_Controller
{
  var $account_login;
  public function __construct()
  {
    parent::__construct();
    $this->load->model('front/account_m','acc');
    $this->load->model("front/skill_m");
    $this->load->model("front/job_m");
    $this->load->model('front/advertising_m');
    $this->account_login=$this->session->acc_log1;
  }
  public function logout()
  {
    $logout_url=$this->uri->segment(3)."/".$this->uri->segment(4);
    $this->session->unset_userdata('acc_log1');
    $this->session->unset_userdata('start_count');
    redirect($logout_url);
  }
  public function validation()
  {
    $this->form_validation->set_rules('ddlPriority','Priority','required');
    $this->form_validation->set_rules('ddlLocation','Location','required');
    $this->form_validation->set_rules('ddlCategory','Category','required');
    $this->form_validation->set_rules('txtName','Name','trim|required');
    $this->form_validation->set_rules('txtWebsite','Website','trim');
    $this->form_validation->set_rules('txtTel','Phone','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
    $this->form_validation->set_rules('txtEmail','Email','trim|valid_email|required');
    $this->form_validation->set_rules('txtAddress','Address','trim');
    $this->form_validation->set_rules('txtLine','Line','trim');
    $this->form_validation->set_rules('txtWhatsapp','WhatsApp','trim');
    $this->form_validation->set_rules('txtAboutMe','About Me','trim');
    $this->form_validation->set_rules('txtGoogle','Google Map','trim');
    if($this->form_validation->run()==TRUE){return TRUE;}
    else{return FALSE;}
  }
  public function post_skill()
  {
    if($this->account_login)
      {
        if($row=$this->skill_m->get_saved()==TRUE)
        {redirect("skill_c/post_skill_edit");}
        else
        {
          //echeck this skill submite aready or not.
          $data["acc_head"]=$this->acc->acc_head();
          $data["ads_top"]=$this->advertising_m->ads_top();
          $this->load->view("template_frontend/herder_and_nav",$data);
          $data["skill_code"]=$this->skill_m->skill_code();
          $data['skill_setup']=$this->skill_m->skill_setup();
          $data["category"]=$this->skill_m->category();
          $data["location"]=$this->skill_m->location();
          $data["account"]=$this->skill_m->account();
          $data["logout_url"]="cv_c/logout/home/cv_thumbnail";
          //$this->load->view("account_welcom/account_welcom",$data);
          $this->load->view("skill/post_skill",$data);
          $this->load->view('template_frontend/footer');
        }
      }
      else
      {
        $this->session->url="home/skill_thumbnail";
        $this->session->cancel="home/skill_thumbnail";
        redirect("home/form_log");
      }

  }
  public function add_skill()
  {
      if(isset($_POST["btnSubmit"]))
        {
           if($this->validation()==TRUE)
            {
               //chheck standard
              $row=$this->skill_m->check_standard();
              if($row->rate_det_type=="Standard")
              {
               $jsonData = json_decode($this->input->post('str'));
                $this->skill_m->insertSkill($jsonData,"Published");
                redirect(base_url()."skill_c/post_skill");
              }
              else
              {
                $jsonData = json_decode($this->input->post('str'));
                $this->skill_m->insertSkill($jsonData,"Submited");
                redirect(base_url()."skill_c/billing_info");
              }
            }
            else{$this->post_skill();}
        }
        elseif(isset($_POST["btnPreview"]))
        {
         if($this->validation()==TRUE)
          {
            $data['acc_info'] =$this->skill_m->account();
            $data['cat_name'] =$this->skill_m->category($this->input->post("ddlCategory"));
            $data['loc_name'] =$this->skill_m->location($this->input->post("ddlLocation"));
            $data["ddlPriority"]=$this->skill_m->skill_setup($this->input->post("ddlPriority"));
            $data["check"]=$this->input->post("chkbox");
            $data["ID"]=$this->input->post("txtSkillID");
            $data["txtImgName"] =$this->input->post("txtImgName");
            $data["txtName"] =$this->input->post("txtName");
            $data["txtWebsite"] =$this->input->post("txtWebsite");
            $data["txtTel"] =$this->input->post("txtTel");
            $data["txtAddress"] =$this->input->post("txtAddress");
            $data["txtEmail"] =$this->input->post("txtEmail");
            $data["txtLine"] =$this->input->post("txtLine");
            $data["txtWhatsapp"] =$this->input->post("txtWhatsapp");
            $data["txtAboutMe"] =$this->input->post("txtAboutMe");
            $data["txtGoogle"] =$this->input->post("txtGoogle");
            $data["skill"]=json_decode($this->input->post('str'));
            $this->load->view("skill/preview",$data);
          }
          else{$this->post_skill();}
        }
  }
  public function add_billing_info($id)
    {
      $row=$this->skill_m->add_billing_info($id);
      if($row==TRUE){redirect("skill_c/post_skill");}
    }
  public function post_skill_edit()
    {
      if($this->account_login)
      {
          $data["ads_top"]=$this->advertising_m->ads_top();
          $this->load->view("template_frontend/herder_and_nav",$data);
          $data['skill_setup']=$this->skill_m->skill_setup();
          $data["category"]=$this->skill_m->category();
          $data["location"]=$this->skill_m->location();
          $data["account"]=$this->skill_m->account();
          $data["get_saved"]=$this->skill_m->get_saved();
          $data["skill_name"]=$this->skill_m->skill_name();
          $data["logout_url"]="cv_c/logout/home/cv_thumbnail";
          $this->load->view("account_welcom/account_welcom",$data);
          $this->load->view("skill/post_skill_edit",$data);
          $this->load->view('template_frontend/footer');
      }
       else
      {
        $this->session->url="home/skill_thumbnail";
        $this->session->cancel="home/skill_thumbnail";
        redirect("home/form_log");
      }
    }
  public function delete($id="")
  {
    if($id!="")
    {
       $row=$this->skill_m->delete($id);
       if($row==TRUE){redirect("skill_c/post_skill");}
    }
  }
  public function skill_detail($id="")
  {
    $data["acc_head"]=$this->acc->acc_head();
    $data["ads_top"]=$this->advertising_m->ads_top();
    $this->load->view("template_frontend/herder_and_nav",$data);
    $data["skill_det"]=$this->skill_m->skill_detail($id);
    $data["right_ads"]=$this->advertising_m->right_ads();
    $this->load->view("skill/skill_detail",$data);
    $this->load->view('template_frontend/advertising',$data);
    $this->load->view('template_frontend/footer');
  }
  public function billing_info()
  {
    if($this->account_login)
      {
        $data["ads_top"]=$this->advertising_m->ads_top();
        $this->load->view("template_frontend/herder_and_nav",$data);
        $data["VAT"]=$this->job_m->VAT();
        $data["billing_info"]=$this->skill_m->billing_info();
        $data["account"]=$this->skill_m->account();
        //logout and welcom
        $data["logout_url"]="skill_c/logout/home/skill_thumbnail";
        $this->load->view("account_welcom/account_welcom",$data);
        $this->load->view("skill/billing_info",$data);
        $this->load->view('template_frontend/footer');
      }
    else
      {
        $this->session->url="home/skill_thumbnail";
        $this->session->cancel="home/skill_thumbnail";
        redirect("home/form_log");
      }
    }
    public function invoice_preview($VAT="")
    {
      $data['acc_info'] =$this->skill_m->account();//slect tbl_account
      $data["VAT"]=$VAT;
      $data["billing_info"]=$this->skill_m->billing_info();
      $this->load->view("skill/invoice_preview",$data);
    }
}
