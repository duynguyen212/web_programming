using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Configuration;
using System.Data;
using System.Data.SqlClient;

namespace Webform_LoginDemo
{
    public class clsDataProcessing
    {
        string conStr= ConfigurationManager.ConnectionStrings["VHSite"].ConnectionString;

        SqlConnection conn;

        void OpenConn ()
        {
            conn = new SqlConnection(conStr);
            conn.Open();
        }

        void CloseConn ()
        {
            conn.Close();
        }

        public bool CheckLogin (string username, string password)
        {
            OpenConn();

            string cmdStr = "SELECT * FROM Users WHERE Username ='" + username + "' AND Password = '" + password + "'";
            SqlCommand cmd = new SqlCommand(cmdStr, conn);
            SqlDataReader dr = cmd.ExecuteReader();
            bool userExists = false;
            if (dr.HasRows == true)
                userExists = true;

            CloseConn();

            return userExists;
        }

        public string GetUserFullName(string username)
        {
            OpenConn();

            string cmdStr = "SELECT FullName FROM Users WHERE Username ='" + username + "'";
            SqlCommand cmd = new SqlCommand(cmdStr, conn);
            string fullName;
            fullName = cmd.ExecuteScalar().ToString();

            CloseConn();

            return fullName;
        }

        public int GetUserRole(string username)
        {
            OpenConn();

            string cmdStr = "SELECT ID FROM Users WHERE Username ='" + username + "'";
            SqlCommand cmd = new SqlCommand(cmdStr, conn);
            int roleID;
            roleID = (int)cmd.ExecuteScalar();

            CloseConn();

            return roleID;
        }
    }

   
}