<?php

class Mail_model extends CI_Model {



	public function __construct() {

	

		parent::__construct();

	}

	

	public function welcome_mail($message,$name) {

	

		$msg = '<div style="margin:0;padding:10px 0;background-image:url('.base_url().'assets/images/bg-tile.png)"; bgcolor="#f0f0f0"> <br>

  <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">

    <tbody>

      <tr>

        <td align="center" valign="top"><table width="600" cellpadding="0" cellspacing="0" border="0" class="m_9107790119469208415m_5762250937799609813container" bgcolor="#ffffff">

            <tbody>

              <tr>

                <td class="m_9107790119469208415m_5762250937799609813logo"><table cellspacing="0" cellpadding="0" border="0" width="100%">

                    <tbody>

                      <tr>

                        <td><div style="padding: 12px 0px; text-align: center; background-color: #004165;"> <img src="'.base_url().'assets/images-nibedita/nibedita-financial-logo.jpg"> </div></td>

                        <td style="text-align:right" valign="middle"></td>

                      </tr>

                    </tbody>

                  </table></td>

              </tr>

              <tr>

                <td class="m_9107790119469208415m_5762250937799609813container-padding" bgcolor="#ffffff" style="background-color:#ffffff;padding-left:30px;padding-right:30px;padding-bottom:20px;padding-top:30px;line-height:22px"><table width="100%" cellspacing="0" cellpadding="0">

                    <tbody>

                      <tr>

                        <td><div style="font-size:15px;line-height:24px;color:#4a5359"> Dear Admin,<br>

                          </div></td>

                      </tr>

                      

                      <tr>

                        <td><div style="font-size:15px;line-height:24px;color:#4a5359">  <br>

                            <br>

                            '.$message.' <br><br>

                            <br>


                            Thanking you,

                            <p style="font-size:15px;color:#4a5359"> '.$name.' </p>

                          </div></td>

                      </tr>

                    </tbody>

                  </table></td>

              </tr>

              <tr>

                <td style="padding:0"><table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#fbfbfb" class="m_9107790119469208415m_5762250937799609813footer">

                    <tbody>

                      
                    </tbody>

                  </table></td>

              </tr>

            </tbody>

          </table></td>

      </tr>

    </tbody>

  </table>

</div>';

	

	return $msg;



	}

	


} // end of class