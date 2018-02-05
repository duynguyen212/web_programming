using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Webform_LoginDemo
{
    public partial class Site1 : System.Web.UI.MasterPage
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            Label1.Text = Application["VisiterCount"].ToString() ;

            if ((bool)Session["IsLoggedIn"] == false)
            {
                Label lblHi = new Label();
                lblHi.Text = "Bonjour, Client(e) | ";

                HyperLink hlkLogIn = new HyperLink();
                hlkLogIn.Text = " Mon compte";
                hlkLogIn.NavigateUrl = "Login.aspx";

                tdUser.Controls.Add(lblHi);
                tdUser.Controls.Add(hlkLogIn);
            }
            else
            {
                Label lblHi = new Label();
                lblHi.Text = "Bonjour, " + Session["FullName"].ToString() + " | ";

                LinkButton lbnLogOut = new LinkButton();
                lbnLogOut.Text = "Log Out";
                lbnLogOut.Click += LbnLogOut_Click;

                tdUser.Controls.Add(lblHi);
                tdUser.Controls.Add(lbnLogOut);
            }
        }

        private void LbnLogOut_Click(object sender, EventArgs e)
        {
            Session["IsLoggedIn"] = false;
            Response.Redirect(Request.RawUrl);
        }
    }
}