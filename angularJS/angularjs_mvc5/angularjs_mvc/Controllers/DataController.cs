using angularjs_mvc.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace angularjs_mvc.Controllers
{
    public class DataController : Controller
    {
        Contact ct = null;
        // GET: Data
        public JsonResult GetLastContact ()
        {
            using (myDbEntities db = new myDbEntities())
            {
                ct = db.Contacts.OrderByDescending(c=>c.ContactId).Take(1).FirstOrDefault();
            }
                return new JsonResult { Data = ct, JsonRequestBehavior = JsonRequestBehavior.AllowGet };
        }

        public JsonResult UserLogin (LoginModel l)
        {
            using (myDbEntities db = new myDbEntities())
            {
                var user = db.Users.Where(ul => ul.Username.Equals(l.UserName) && ul.Password.Equals(l.Password)).FirstOrDefault();
                return new JsonResult { Data = user, JsonRequestBehavior = JsonRequestBehavior.AllowGet };
            }
        }

        public JsonResult getEmployeeList()
        {
            List<Employee> Employees = new List<Employee>();

            using (myDbEntities db = new myDbEntities())
            {
                Employees = db.Employees.OrderBy(e => e.LastName).ToList();
            }

            return new JsonResult { Data = Employees, JsonRequestBehavior = JsonRequestBehavior.AllowGet };
        }

        public JsonResult getListCountry()
        {
            List<Country> allCountries = new List<Country>();
            using (myDbEntities db = new myDbEntities())
            {
                allCountries = db.Countries.OrderBy(c=>c.CountryName).ToList();
            }

            return new JsonResult { Data = allCountries, JsonRequestBehavior = JsonRequestBehavior.AllowGet };
        }

        public JsonResult getStateByCountryID(int countryID)
        {
            List<State> states = new List<State>();
            using (myDbEntities db = new myDbEntities())
            {
                states = db.States.Where(s => s.CountryId.Equals(countryID)).OrderBy(s=>s.StateName).ToList();
            }

            return new JsonResult { Data = states, JsonRequestBehavior = JsonRequestBehavior.AllowGet };
        }
    }
}