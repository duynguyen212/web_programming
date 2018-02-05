using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Webform_LoginDemo
{
    public partial class ProductManager : System.Web.UI.Page
    {
        clsDataProcessing _DB = new clsDataProcessing();

        protected void Page_Load(object sender, EventArgs e)
        {
            if ((bool)Session["IsLoggedIn"] == false)
            {
                Session["ExclamationID"] = 1; //ID Message : 1 is the page is for logged in users
                Response.Redirect("RedirectPage.aspx");
            }

            int roleID = _DB.GetUserRole(Session["Username"].ToString());

            if (roleID != 1)
            {
                Session["ExclamationID"] = 2; //ID Message : 2 is the page is for admin
                Response.Redirect("RedirectPage.aspx");
            }
        }
    }
}