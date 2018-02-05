using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Webform_LoginDemo
{
    public partial class Produit : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if ((bool)Session["IsLoggedIn"] == false)
            {
                Session["ExclamationID"] = 1; //ID Message : 1 is the page is for logged in users
                Response.Redirect("RedirectPage.aspx"); 
            } 
            
        }
    }
}