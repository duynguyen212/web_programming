﻿Public Class CodeBehind
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Label1.Text = "Hello, World. The time is now " & DateTime.Now.ToString()
    End Sub


End Class