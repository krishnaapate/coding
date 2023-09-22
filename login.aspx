<%@ Page Title="" Language="VB" MasterPageFile="~/1.master" AutoEventWireup="false" CodeFile="login.aspx.vb" Inherits="login" Theme="SkinFile" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <br />
<br />
<br />
<br />
<asp:Label ID="Label1" runat="server" Text="username"></asp:Label>
&nbsp;&nbsp;
    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
    <br />
    <br />
    <asp:Label ID="Label2" runat="server" Text="password"></asp:Label>
    &nbsp;&nbsp;
    <asp:TextBox ID="TextBox2" runat="server" TextMode="Password"></asp:TextBox>
    <br />
    <br />
    <asp:Button ID="Button1" runat="server" Text="login" />
<br />
<br />
<br />
<br />
<asp:Label ID="Label3" runat="server"></asp:Label>
</asp:Content>

