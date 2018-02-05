using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Webform_LoginDemo
{
    public partial class Login : System.Web.UI.Page
    {
        clsDataProcessing _DB = new clsDataProcessing();

        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnLogIn_Click(object sender, EventArgs e)
        {
            bool hasUser = _DB.CheckLogin(txtUsername.Text, txtPassword.Text);
            if (hasUser)
            {
                Session["IsLoggedIn"] = true;
                Session["Username"] = txtUsername.Text;
                Session["FullName"] = _DB.GetUserFullName(txtUsername.Text);
                Response.Redirect("Index.aspx");
            }
            else
            {
                lblError.Visible = true;
            }
           
        }
    }
}