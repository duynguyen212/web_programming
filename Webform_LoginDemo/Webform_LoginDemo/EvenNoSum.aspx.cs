using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Webform_LoginDemo
{
    public partial class EvenNoSum : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (IsPostBack == false)
            {
                ViewState["EvenNo"] = 0;
            }
        }

        protected void Sum_Click(object sender, EventArgs e)
        {
            int evenNo = int.Parse(txtEvenNo.Text);
            if( (evenNo % 2) == 0)
            {
                ViewState["EvenNo"] = (int)ViewState["EvenNo"] + evenNo;
            }
            lblResult.Text = ViewState["EvenNo"].ToString();
        }
    }
}