خیلی خوب 👌
بریم سراغ روش دوم: من کل سورس پروژه رو اینجا برات می‌ذارم. فقط کافیه روی ویندوزت یه پوشه به اسم AutoClickerTyper بسازی، بعد فایل‌ها رو با همین اسم‌هایی که میگم ذخیره کنی. بعدش پروژه رو با Visual Studio باز کن، Build بزنی و آماده میشه.


---

1. فایل Program.cs

using System;
using System.Windows.Forms;

namespace AutoClickerTyper
{
    static class Program
    {
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new Form1());
        }
    }
}


---

2. فایل Form1.cs

using System;
using System.Collections.Generic;
using System.Runtime.InteropServices;
using System.Threading;
using System.Windows.Forms;
using MaterialSkin;
using MaterialSkin.Controls;

namespace AutoClickerTyper
{
    public partial class Form1 : MaterialForm
    {
        private List<string> commands = new List<string>();

        [DllImport("user32.dll")]
        static extern void mouse_event(int dwFlags, int dx, int dy, int dwData, int dwExtraInfo);

        private const int MOUSEEVENTF_LEFTDOWN = 0x02;
        private const int MOUSEEVENTF_LEFTUP = 0x04;
        private const int MOUSEEVENTF_RIGHTDOWN = 0x08;
        private const int MOUSEEVENTF_RIGHTUP = 0x10;

        public Form1()
        {
            InitializeComponent();

            var skinManager = MaterialSkinManager.Instance;
            skinManager.AddFormToManage(this);
            skinManager.Theme = MaterialSkinManager.Themes.DARK;
            skinManager.ColorScheme = new ColorScheme(Primary.BlueGrey800, Primary.BlueGrey900, Primary.BlueGrey500, Accent.LightBlue200, TextShade.WHITE);
        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            if (txtCommand.Text.Trim() != "")
            {
                commands.Add(txtCommand.Text);
                listBox1.Items.Add(txtCommand.Text);
                txtCommand.Clear();
            }
        }

        private void btnRun_Click(object sender, EventArgs e)
        {
            new Thread(() =>
            {
                Thread.Sleep(3000); // تأخیر برای آماده شدن کاربر
                foreach (string cmd in commands)
                {
                    if (cmd.StartsWith("CLICK LEFT"))
                    {
                        mouse_event(MOUSEEVENTF_LEFTDOWN, 0, 0, 0, 0);
                        mouse_event(MOUSEEVENTF_LEFTUP, 0, 0, 0, 0);
                    }
                    else if (cmd.StartsWith("CLICK RIGHT"))
                    {
                        mouse_event(MOUSEEVENTF_RIGHTDOWN, 0, 0, 0, 0);
                        mouse_event(MOUSEEVENTF_RIGHTUP, 0, 0, 0, 0);
                    }
                    else if (cmd.StartsWith("TYPE "))
                    {
                        string text = cmd.Substring(5);
                        foreach (char c in text)
                        {
                            SendKeys.SendWait(c.ToString());
                            Thread.Sleep(50);
                        }
                    }
                    else if (cmd.StartsWith("WAIT "))
                    {
                        int ms = int.Parse(cmd.Substring(5));
                        Thread.Sleep(ms);
                    }
                    Thread.Sleep(300);
                }
            }).Start();
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            commands.Clear();
            listBox1.Items.Clear();
        }
    }
}


---

3. فایل Form1.Designer.cs

namespace AutoClickerTyper
{
    partial class Form1
    {
        private System.ComponentModel.IContainer components = null;
        private MaterialSkin.Controls.MaterialButton btnAdd;
        private MaterialSkin.Controls.MaterialButton btnRun;
        private MaterialSkin.Controls.MaterialButton btnClear;
        private System.Windows.Forms.ListBox listBox1;
        private MaterialSkin.Controls.MaterialTextBox txtCommand;

        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        private void InitializeComponent()
        {
            this.btnAdd = new MaterialSkin.Controls.MaterialButton();
            this.btnRun = new MaterialSkin.Controls.MaterialButton();
            this.btnClear = new MaterialSkin.Controls.MaterialButton();
            this.listBox1 = new System.Windows.Forms.ListBox();
            this.txtCommand = new MaterialSkin.Controls.MaterialTextBox();
            this.SuspendLayout();
            // 
            // txtCommand
            // 
            this.txtCommand.Hint = "دستور را وارد کنید (CLICK / TYPE / WAIT)";
            this.txtCommand.Location = new System.Drawing.Point(12, 80);
            this.txtCommand.Size = new System.Drawing.Size(400, 50);
            this.txtCommand.TabIndex = 0;
            // 
            // btnAdd
            // 
            this.btnAdd.Text = "➕ افزودن";
            this.btnAdd.Location = new System.Drawing.Point(420, 80);
            this.btnAdd.Click += new System.EventHandler(this.btnAdd_Click);
            // 
            // btnRun
            // 
            this.btnRun.Text = "▶ اجرا";
            this.btnRun.Location = new System.Drawing.Point(12, 400);
            this.btnRun.Click += new System.EventHandler(this.btnRun_Click);
            // 
            // btnClear
            // 
            this.btnClear.Text = "🗑 پاک کردن";
            this.btnClear.Location = new System.Drawing.Point(120, 400);
            this.btnClear.Click += new System.EventHandler(this.btnClear_Click);
            // 
            // listBox1
            // 
            this.listBox1.BackColor = System.Drawing.Color.FromArgb(40, 40, 40);
            this.listBox1.ForeColor = System.Drawing.Color.White;
            this.listBox1.Location = new System.Drawing.Point(12, 140);
            this.listBox1.Size = new System.Drawing.Size(480, 250);
            this.listBox1.TabIndex = 4;
            // 
            // Form1
            // 
            this.ClientSize = new System.Drawing.Size(520, 450);
            this.Controls.Add(this.txtCommand);
            this.Controls.Add(this.btnAdd);
            this.Controls.Add(this.btnRun);
            this.Controls.Add(this.btnClear);
            this.Controls.Add(this.listBox1);
            this.Text = "Auto Clicker & Typer";
            this.ResumeLayout(false);
        }
    }
}


---

4. فایل AutoClickerTyper.csproj

<Project Sdk="Microsoft.NET.Sdk.WindowsDesktop">

  <PropertyGroup>
    <OutputType>WinExe</OutputType>
    <TargetFramework>net48</TargetFramework>
    <UseWindowsForms>true</UseWindowsForms>
  </PropertyGroup>

  <ItemGroup>
    <PackageReference Include="MaterialSkin.2" Version="2.3.1" />
  </ItemGroup>

</Project>


---

5. فایل AutoClickerTyper.sln

(برای اینکه پروژه راحت در ویژوال استودیو باز بشه)

Microsoft Visual Studio Solution File, Format Version 12.00
# Visual Studio Version 17
VisualStudioVersion = 17.0.31903.59
MinimumVisualStudioVersion = 10.0.40219.1
Project("{FAE04EC0-301F-11D3-BF4B-00C04F79EFBC}") = "AutoClickerTyper", "AutoClickerTyper.csproj", "{8A3C38E5-4D34-44A7-9472-1AE13BE934A2}"
EndProject
Global
    GlobalSection(SolutionConfigurationPlatforms) = preSolution
        Debug|Any CPU = Debug|Any CPU
        Release|Any CPU = Release|Any CPU
    EndGlobalSection
    GlobalSection(ProjectConfigurationPlatforms) = postSolution
        {8A3C38E5-4D34-44A7-9472-1AE13BE934A2}.Debug|Any CPU.ActiveCfg = Debug|Any CPU
        {8A3C38E5-4D34-44A7-9472-1AE13BE934A2}.Debug|Any CPU.Build.0 = Debug|Any CPU
        {8A3C38E5-4D34-44A7-9472-1AE13BE934A2}.Release|Any CPU.ActiveCfg = Release|Any CPU
        {8A3C38E5-4D34-44A7-9472-1AE13BE934A2}.Release|Any CPU.Build.0 = Release|Any CPU
    EndGlobalSection
EndGlobal


---

✅ حالا فقط کافیه این فایل‌ها رو در یک پوشه بذاری → بعد با Visual Studio باز کنی → NuGet خودش MaterialSkin.2 رو نصب می‌کنه → Build کنی → برنامه آماده اجراست.

می‌خوای بعد از این مرحله هم راهنمای ساخت Setup.exe نصبی رو بگم؟

