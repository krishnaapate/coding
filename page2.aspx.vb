Imports System.Data
Partial Class page2
    Inherits System.Web.UI.Page
    Dim c As New Class1
    Dim ds As New DataSet
    Protected Sub Button1_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Button1.Click
        Dim username As String
        username = Session("username")
        c.IUD("insert into order_tbl values(" & DropDownList1.SelectedValue & ",'" & username & "')")
        MsgBox("Product is purchased")
    End Sub

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        If Not IsPostBack Then
            ds = c.Display("select * from product")
            GridView1.DataSource = ds
            GridView1.DataBind()
            DropDownList1.DataSource = ds.Tables(0)
            DropDownList1.DataTextField = "pname"
            DropDownList1.DataValueField = "pid"
            DropDownList1.DataBind()
        End If
    End Sub

    Protected Sub DropDownList1_SelectedIndexChanged(sender As Object, e As System.EventArgs) Handles DropDownList1.SelectedIndexChanged

    End Sub
End Class
