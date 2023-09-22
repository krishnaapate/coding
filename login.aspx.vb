Imports System.Data
Imports System.Data.OleDb
Partial Class login
    Inherits System.Web.UI.Page
    Dim ds As New DataSet
    Dim c As New Class1
    Protected Sub Button1_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Button1.Click
        Dim role As Char
        ds = c.Display("select role from login where username='" & TextBox1.Text & "' and password ='" & TextBox2.Text & "'")
        If ds.Tables(0).Rows.Count > 0 Then
            Session("username") = TextBox1.Text
            role = ds.Tables(0).Rows(0).Item("role").ToString
            If role = "P" Then
                Response.Redirect("page2.aspx")
            ElseIf role = "S" Then
                Response.Redirect("page1.aspx")
            End If
        Else
            Label3.Visible = True
            Label3.Text = "User Name and Password Doesn't Match"
        End If

    End Sub
End Class
