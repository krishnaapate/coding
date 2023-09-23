Imports Microsoft.VisualBasic
Imports System.Data.OleDb
Imports System.Data
Public Class Class1
    Dim cn As New OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=F:\WebSite1\Database1.accdb")
    Dim cm As OleDbCommand
    Dim da As OleDbDataAdapter
    Dim ds As New DataSet

Public Sub IUD(ByVal str As String)
    If cn.State = ConnectionState.closed Then
        cn.open()
    End If
        cm = New OleDbCommand(str, cn)
    cm.ExecuteNonQuery()
    cn.close()
End Sub

Public Function Display(ByVal str As String) As DataSet
        da = New OleDbDataAdapter(str, cn)
    ds.Tables.clear()
    da.Fill(ds)
    Return ds
    End Function
End Class

