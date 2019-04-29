using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace angularjs_mvc.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }

        //fetch data from contact
        public ActionResult GetContact()
        {
            return View();
        }

        //login
        public ActionResult Login()
        {
            return View();
        }

        //get employees list
        public ActionResult GetEmployeeList()
        {
            return View();
        }
    }
}