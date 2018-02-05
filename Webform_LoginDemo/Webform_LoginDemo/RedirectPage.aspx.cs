using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Webform_LoginDemo
{
    public partial class RedirectPage : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            switch ((int)Session["ExclamationID"])
            {
                case 1 :
                    lblMessage.Text = "You need to login our system.";
                    break;
                case 2:
                    lblMessage.Text = "This page is just for admin";
                    break;
            }
        }
    }
}