
Partial Class page1
    Inherits System.Web.UI.Page
    Dim c As New Class1
    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load

    End Sub

    Protected Sub Button1_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Button1.Click
        c.IUD("insert into product values(" & TextBox1.Text & ", '" & TextBox2.Text & "'," & TextBox3.Text & ")")
        ' Response.Redirect("~/page1.aspx")
        MsgBox("record inserted sucessfully")
    End Sub
End Class
