USE [master]
GO
/****** Object:  Database [DB_Planilla]    Script Date: 2/16/2021 2:22:06 PM ******/
CREATE DATABASE [DB_Planilla]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'DB_Planilla', FILENAME = N'C:\Program Files\Microsoft SQL Server2\MSSQL12.SQLSERVER2\MSSQL\DATA\DB_Planilla.mdf' , SIZE = 3264KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'DB_Planilla_log', FILENAME = N'C:\Program Files\Microsoft SQL Server2\MSSQL12.SQLSERVER2\MSSQL\DATA\DB_Planilla_log.ldf' , SIZE = 816KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [DB_Planilla] SET COMPATIBILITY_LEVEL = 120
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [DB_Planilla].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [DB_Planilla] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [DB_Planilla] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [DB_Planilla] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [DB_Planilla] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [DB_Planilla] SET ARITHABORT OFF 
GO
ALTER DATABASE [DB_Planilla] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [DB_Planilla] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [DB_Planilla] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [DB_Planilla] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [DB_Planilla] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [DB_Planilla] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [DB_Planilla] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [DB_Planilla] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [DB_Planilla] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [DB_Planilla] SET  ENABLE_BROKER 
GO
ALTER DATABASE [DB_Planilla] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [DB_Planilla] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [DB_Planilla] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [DB_Planilla] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [DB_Planilla] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [DB_Planilla] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [DB_Planilla] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [DB_Planilla] SET RECOVERY FULL 
GO
ALTER DATABASE [DB_Planilla] SET  MULTI_USER 
GO
ALTER DATABASE [DB_Planilla] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [DB_Planilla] SET DB_CHAINING OFF 
GO
ALTER DATABASE [DB_Planilla] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [DB_Planilla] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
ALTER DATABASE [DB_Planilla] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'DB_Planilla', N'ON'
GO
USE [DB_Planilla]
GO
/****** Object:  Table [dbo].[Contacto]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Contacto](
	[nombre] [varchar](50) NOT NULL,
	[telefono] [varchar](15) NOT NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Departamento]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Departamento](
	[id_departamento] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_departamento] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Incapacidad]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Incapacidad](
	[id_incapacidad] [int] IDENTITY(1,1) NOT NULL,
	[dia_inicio] [date] NOT NULL,
	[dia_final] [date] NOT NULL,
	[estado] [bit] NULL,
	[id_usuario] [varchar](15) NULL,
	[dias] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_incapacidad] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Permiso]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Permiso](
	[id_permiso] [int] IDENTITY(1,1) NOT NULL,
	[tipo] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_permiso] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Planilla_hist]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Planilla_hist](
	[id_planilla_hist] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [date] NOT NULL,
	[salario_neto] [money] NOT NULL,
	[incapacidad] [money] NULL,
	[ccss] [money] NULL,
	[banco] [money] NULL,
	[asosiacion] [money] NULL,
	[salario_bruto] [money] NULL,
	[id_incapacidad] [int] NULL,
	[id_usuario] [varchar](15) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_planilla_hist] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Planilla_tmp]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Planilla_tmp](
	[id_planilla] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [date] NOT NULL,
	[salario_neto] [money] NOT NULL,
	[incapacidad] [money] NULL,
	[ccss] [money] NULL,
	[banco] [money] NULL,
	[asosiacion] [money] NULL,
	[salario_bruto] [money] NULL,
	[id_incapacidad] [int] NULL,
	[id_usuario] [varchar](15) NULL,
	[status] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_planilla] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Puesto]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Puesto](
	[id_puesto] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NOT NULL,
	[descripcion] [varchar](300) NOT NULL,
	[salario_min] [money] NOT NULL,
	[salario_max] [money] NOT NULL,
	[estudios] [bit] NULL,
	[id_departamento] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_puesto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Usuario]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Usuario](
	[id_usuario] [varchar](15) NOT NULL,
	[nombre] [varchar](50) NOT NULL,
	[primer_apellido] [varchar](50) NOT NULL,
	[segundo_apellido] [varchar](50) NOT NULL,
	[password] [varchar](50) NOT NULL,
	[nacionalidad] [varchar](50) NOT NULL,
	[asosiacion] [bit] NULL,
	[salario] [money] NOT NULL,
	[direccion] [varchar](300) NOT NULL,
	[telefono] [varchar](15) NOT NULL,
	[fecha_ingreso] [date] NOT NULL,
	[cuenta] [varchar](20) NOT NULL,
	[activo] [bit] NULL,
	[id_permiso] [int] NULL,
	[id_puesto] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[Contacto] ([nombre], [telefono]) VALUES (N'RH', N'21110788')
INSERT [dbo].[Contacto] ([nombre], [telefono]) VALUES (N'Consultas', N'21110789')
SET IDENTITY_INSERT [dbo].[Departamento] ON 

INSERT [dbo].[Departamento] ([id_departamento], [Nombre]) VALUES (1, N'admin')
INSERT [dbo].[Departamento] ([id_departamento], [Nombre]) VALUES (2, N'ti')
SET IDENTITY_INSERT [dbo].[Departamento] OFF
SET IDENTITY_INSERT [dbo].[Incapacidad] ON 

INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (1, CAST(N'2021-01-10' AS Date), CAST(N'2021-02-18' AS Date), 0, N'305070164', 8)
INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (2, CAST(N'2021-02-10' AS Date), CAST(N'2021-02-25' AS Date), 0, N'305070164', 15)
INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (3, CAST(N'2021-02-10' AS Date), CAST(N'2021-02-25' AS Date), 0, N'305070164', 15)
INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (4, CAST(N'2021-02-17' AS Date), CAST(N'2021-02-18' AS Date), 0, N'305070164', 1)
INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (1004, CAST(N'2021-02-17' AS Date), CAST(N'2021-02-17' AS Date), 0, N'305070164', 0)
INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (1005, CAST(N'2021-02-17' AS Date), CAST(N'2021-02-17' AS Date), 0, N'305070164', 0)
INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (1006, CAST(N'2021-02-17' AS Date), CAST(N'2021-02-17' AS Date), 0, N'305070164', 0)
INSERT [dbo].[Incapacidad] ([id_incapacidad], [dia_inicio], [dia_final], [estado], [id_usuario], [dias]) VALUES (1007, CAST(N'2021-02-17' AS Date), CAST(N'2021-02-17' AS Date), 1, N'305070164', 0)
SET IDENTITY_INSERT [dbo].[Incapacidad] OFF
SET IDENTITY_INSERT [dbo].[Permiso] ON 

INSERT [dbo].[Permiso] ([id_permiso], [tipo]) VALUES (2, N'Escritura')
INSERT [dbo].[Permiso] ([id_permiso], [tipo]) VALUES (1, N'lectura')
SET IDENTITY_INSERT [dbo].[Permiso] OFF
SET IDENTITY_INSERT [dbo].[Planilla_hist] ON 

INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (2, CAST(N'2021-02-13' AS Date), 258533.3326, 93333.3331, 19600.0000, 1866.6667, 0.0000, 186666.6662, 1, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (3, CAST(N'2021-02-13' AS Date), 119700.0000, 0.0000, 14700.0000, 1400.0000, 4200.0000, 140000.0000, NULL, N'23232312464')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (4, CAST(N'2021-02-13' AS Date), 258533.3326, 93333.3331, 19600.0000, 1866.6667, 0.0000, 186666.6662, 1, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (5, CAST(N'2021-02-13' AS Date), 119700.0000, 0.0000, 14700.0000, 1400.0000, 4200.0000, 140000.0000, NULL, N'23232312464')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (1002, CAST(N'2021-02-14' AS Date), 258533.3326, 93333.3331, 19600.0000, 1866.6667, 0.0000, 186666.6662, 1, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (1003, CAST(N'2021-02-14' AS Date), 119700.0000, 0.0000, 14700.0000, 1400.0000, 4200.0000, 140000.0000, NULL, N'23232312464')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (1004, CAST(N'2021-02-14' AS Date), 258533.3326, 93333.3331, 19600.0000, 1866.6667, 0.0000, 186666.6662, 3, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (1005, CAST(N'2021-02-14' AS Date), 119700.0000, 0.0000, 14700.0000, 1400.0000, 4200.0000, 140000.0000, NULL, N'23232312464')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (1006, CAST(N'2021-02-14' AS Date), 258533.3326, 93333.3331, 19600.0000, 1866.6667, 0.0000, 186666.6662, 3, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (1007, CAST(N'2021-02-14' AS Date), 119700.0000, 0.0000, 14700.0000, 1400.0000, 4200.0000, 140000.0000, NULL, N'23232312464')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (1008, CAST(N'2021-02-15' AS Date), 258533.3326, 93333.3300, 19600.0000, 1866.6700, 0.0000, 186666.6662, 3, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (2008, CAST(N'2021-02-18' AS Date), 154933.3329, 13333.3333, 16800.0000, 1600.0000, 0.0000, 159999.9996, 4, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (2009, CAST(N'2021-02-18' AS Date), 119700.0000, 0.0000, 14700.0000, 1400.0000, 4200.0000, 140000.0000, NULL, N'23232312464')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (2010, CAST(N'2021-02-18' AS Date), 154933.3329, 13333.3333, 16800.0000, 1600.0000, 0.0000, 159999.9996, 4, N'305070164')
INSERT [dbo].[Planilla_hist] ([id_planilla_hist], [fecha], [salario_neto], [incapacidad], [ccss], [banco], [asosiacion], [salario_bruto], [id_incapacidad], [id_usuario]) VALUES (2011, CAST(N'2021-02-18' AS Date), 119700.0000, 0.0000, 14700.0000, 1400.0000, 4200.0000, 140000.0000, NULL, N'23232312464')
SET IDENTITY_INSERT [dbo].[Planilla_hist] OFF
SET IDENTITY_INSERT [dbo].[Puesto] ON 

INSERT [dbo].[Puesto] ([id_puesto], [nombre], [descripcion], [salario_min], [salario_max], [estudios], [id_departamento]) VALUES (1, N'Administrativo', N'Departamento Administracio y Gestion', 500000.0000, 1000000.0000, 1, 1)
INSERT [dbo].[Puesto] ([id_puesto], [nombre], [descripcion], [salario_min], [salario_max], [estudios], [id_departamento]) VALUES (2, N'TI', N'Departamento de TI', 600000.0000, 1600000.0000, 1, 2)
SET IDENTITY_INSERT [dbo].[Puesto] OFF
INSERT [dbo].[Usuario] ([id_usuario], [nombre], [primer_apellido], [segundo_apellido], [password], [nacionalidad], [asosiacion], [salario], [direccion], [telefono], [fecha_ingreso], [cuenta], [activo], [id_permiso], [id_puesto]) VALUES (N'23232312464', N'Wiliam', N'Romero', N'Munoz', N'admin', N'costarricense', 1, 600000.0000, N'Nunca jamas', N'85350755', CAST(N'2021-01-01' AS Date), N'41564641313', 1, 2, 1)
INSERT [dbo].[Usuario] ([id_usuario], [nombre], [primer_apellido], [segundo_apellido], [password], [nacionalidad], [asosiacion], [salario], [direccion], [telefono], [fecha_ingreso], [cuenta], [activo], [id_permiso], [id_puesto]) VALUES (N'305070164', N'Fabian', N'Romero', N'Munoz', N'12345678', N'costarricense', 0, 800000.0000, N'San Rafael, de Oreamuno 800 metros noroeste de la plaza, urbanizaciÃ³n Vista Hermosa
Casa H 15', N'85350755', CAST(N'2021-02-12' AS Date), N'21314414515', 1, 1, 2)
SET ANSI_PADDING ON

GO
/****** Object:  Index [UQ__Departam__75E3EFCFAFB1CC7D]    Script Date: 2/16/2021 2:22:06 PM ******/
ALTER TABLE [dbo].[Departamento] ADD UNIQUE NONCLUSTERED 
(
	[Nombre] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON

GO
/****** Object:  Index [UQ__Permiso__E7F9564963EE883E]    Script Date: 2/16/2021 2:22:06 PM ******/
ALTER TABLE [dbo].[Permiso] ADD UNIQUE NONCLUSTERED 
(
	[tipo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Incapacidad] ADD  DEFAULT ((1)) FOR [estado]
GO
ALTER TABLE [dbo].[Planilla_hist] ADD  DEFAULT ((0)) FOR [incapacidad]
GO
ALTER TABLE [dbo].[Planilla_hist] ADD  DEFAULT ((0)) FOR [ccss]
GO
ALTER TABLE [dbo].[Planilla_hist] ADD  DEFAULT ((0)) FOR [banco]
GO
ALTER TABLE [dbo].[Planilla_hist] ADD  DEFAULT ((0)) FOR [asosiacion]
GO
ALTER TABLE [dbo].[Planilla_hist] ADD  DEFAULT ((0)) FOR [salario_bruto]
GO
ALTER TABLE [dbo].[Planilla_tmp] ADD  DEFAULT ((0)) FOR [incapacidad]
GO
ALTER TABLE [dbo].[Planilla_tmp] ADD  DEFAULT ((0)) FOR [ccss]
GO
ALTER TABLE [dbo].[Planilla_tmp] ADD  DEFAULT ((0)) FOR [banco]
GO
ALTER TABLE [dbo].[Planilla_tmp] ADD  DEFAULT ((0)) FOR [asosiacion]
GO
ALTER TABLE [dbo].[Planilla_tmp] ADD  DEFAULT ((0)) FOR [salario_bruto]
GO
ALTER TABLE [dbo].[Puesto] ADD  DEFAULT ((0)) FOR [estudios]
GO
ALTER TABLE [dbo].[Usuario] ADD  DEFAULT ((0)) FOR [asosiacion]
GO
ALTER TABLE [dbo].[Usuario] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[Incapacidad]  WITH CHECK ADD FOREIGN KEY([id_usuario])
REFERENCES [dbo].[Usuario] ([id_usuario])
GO
ALTER TABLE [dbo].[Planilla_hist]  WITH CHECK ADD FOREIGN KEY([id_incapacidad])
REFERENCES [dbo].[Incapacidad] ([id_incapacidad])
GO
ALTER TABLE [dbo].[Planilla_hist]  WITH CHECK ADD FOREIGN KEY([id_usuario])
REFERENCES [dbo].[Usuario] ([id_usuario])
GO
ALTER TABLE [dbo].[Planilla_tmp]  WITH CHECK ADD FOREIGN KEY([id_incapacidad])
REFERENCES [dbo].[Incapacidad] ([id_incapacidad])
GO
ALTER TABLE [dbo].[Planilla_tmp]  WITH CHECK ADD FOREIGN KEY([id_usuario])
REFERENCES [dbo].[Usuario] ([id_usuario])
GO
ALTER TABLE [dbo].[Puesto]  WITH CHECK ADD FOREIGN KEY([id_departamento])
REFERENCES [dbo].[Departamento] ([id_departamento])
GO
ALTER TABLE [dbo].[Usuario]  WITH CHECK ADD FOREIGN KEY([id_permiso])
REFERENCES [dbo].[Permiso] ([id_permiso])
GO
ALTER TABLE [dbo].[Usuario]  WITH CHECK ADD FOREIGN KEY([id_puesto])
REFERENCES [dbo].[Puesto] ([id_puesto])
GO
/****** Object:  StoredProcedure [dbo].[ActualizarPuesto]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

-- =============================================
-- Author:		<William Romero Munoz>
-- Create date: <01/1/2021>
-- Description:	<Update a la tabla Puesto>
-- =============================================
create procedure [dbo].[ActualizarPuesto]
	@id_puesto INT,
	@nombre VARCHAR(50),
	@descripcion VARCHAR(300),
	@salario_min MONEY,
	@salario_max MONEY,
	@estudios BIT,
	@id_departamento INT
as
begin
	/* Falta el isnulll*/
	UPDATE Puesto
	SET nombre = @nombre,
		descripcion = @descripcion,
		salario_min= @salario_max,
		estudios = @estudios,
		id_departamento = @id_departamento
	WHERE id_puesto = @id_puesto
end

GO
/****** Object:  StoredProcedure [dbo].[calcIncapacidad]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[calcIncapacidad] 
	@id_usuario varchar(15)
as
begin
	print(@id_usuario)

	declare @today date = getdate(), @is date, @iI date, @fI date, @rest int

	select @iI = dia_inicio from Incapacidad where id_usuario = @id_usuario AND estado = 1
	select @fI = dia_final from Incapacidad where id_usuario = @id_usuario AND estado = 1

	print('today: ' + convert(varchar, @today))

	set @today = (case DATENAME(dw, @today)
					when 'Monday' then DATEADD(DAY, 3, @today)
					when 'Tuesday' then DATEADD(DAY, 2, @today)
					when 'Wednesday' then DATEADD(DAY, 1, @today)
					when 'Friday' then DATEADD(DAY, 6, @today)
					when 'Saturday' then DATEADD(DAY, 5, @today)
					when 'Sunday' then DATEADD(DAY, 4, @today)
				end)

	print('today Tueday: ' + convert(varchar, @today))

	set @is = DATEADD(DAY,-7,@today)

	print('Inicio semana: ' + convert(varchar, @is))
	print('Inicio Incapacidad: ' + convert(varchar, @iI))
	print('Fin Incapacidad: ' + convert(varchar, @fI))

	if DATEDIFF(day, @is, @iI) <= 0 begin
		if DATEDIFF(day, @today, @fI) <= 0 begin
			print('Differencia 1: ' + convert(char,DATEDIFF(day, @is, @fI)))
			set @rest = DATEDIFF(day, @is, @fI)
		end
		else
			print('Differencia 2: ' + convert(char,DATEDIFF(day, @is, @today)))
			set @rest = DATEDIFF(day, @is, @today)
	end
	else begin
		if DATEDIFF(day, @today, @fI) <= 0 begin
			print('Differencia 3: ' + convert(char,DATEDIFF(day, @iI, @fI)))
			set @rest = DATEDIFF(day, @iI, @fI)
		end
		else
			print('Differencia 4: ' + convert(char,DATEDIFF(day, @iI, @today)))
			set @rest = DATEDIFF(day, @iI, @today)
	end
		
	return @rest
end

GO
/****** Object:  StoredProcedure [dbo].[CalcularPlanilla]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[CalcularPlanilla]
as
	/*variables*/
	declare @salarioMensual money,
			@estadoIncapacidad bit,
			@estadoAsosiacion bit,
			@diasIncapacidad int,
			@salarioDia money,
			@salarioBruto money,
			@salarioNeto money,
			@ccss money,
			@incapacidad money,
			@bancoPopular money,
			@asosiacion money,
			@id_usuario varchar(15),
			@id_incapacidad int,
			@today date

	/*tabla temporal*/
	declare @resultadosTmp table
		(
			fecha DATE,
			salario_neto MONEY,
			incapacidad MONEY,
			ccss MONEY,
			banco MONEY,
			asosiacion MONEY,
			salario_bruto money,
			id_incapacidad int
		)

	/*cursor*/
	declare CurEmpleado cursor for
		Select a.asosiacion, a.salario, ISNULL(b.dias, 0) as 'dias', a.id_usuario,  ISNULL(b.estado, 0), b.id_incapacidad
		from Usuario a 
		full join Incapacidad b on (a.id_usuario = b.id_usuario)
		where a.activo = 1 and b.estado = 1 or b.estado is null 

	open CurEmpleado

	fetch next from CurEmpleado into
		@estadoAsosiacion, @salarioMensual, @incapacidad, @id_usuario, @estadoIncapacidad, @id_incapacidad

	while @@FETCH_STATUS = 0
	begin
		/* 
		 * Calcular el salario x dia
		 */
		set @salarioDia = isnull(@salarioMensual, 0) / 30
		/* 
		 * Verifica si esta incapacitado
		 */
		if @estadoIncapacidad > 0
		begin
			exec @diasIncapacidad = calcIncapacidad @id_usuario
			
			print('dias incapacidad ' + convert(varchar(30), @diasIncapacidad))
			print('salario bruto ' + convert(varchar(30), @salarioBruto))
			
			print('salario dia ' + convert(varchar(30), @salarioDia))

			/* calcular el salario bruto con incapacidad */
			if 7 - isnull(@diasIncapacidad, 0) = 0 begin
				set @salarioBruto = 7 * isnull(@salarioDia, 0)
			end
			else begin
				set @salarioBruto = (7 - isnull(@diasIncapacidad, 0)) * isnull(@salarioDia, 0)
			end
			
			print('new salario bruto ' + convert(varchar(30), @salarioBruto))
			print('OPeracion 1 ' + convert(varchar(30), 7 - @diasIncapacidad))
			/* calcular el pago de la incapacidad */
			set @incapacidad = (@salarioDia * 0.5) * @diasIncapacidad

			print('incapacidad ' + convert(varchar(30), @incapacidad))
			end
		else
			/* calcular el salario bruto sin incapacidad */
			set @salarioBruto = 7 * @salarioDia
			
		/* 
		 * Calcular el pago a la CCSS
		 */
		set @ccss = isnull(@salarioBruto, 0) * 0.105
		/* 
		 * Calcular el pago al Banco Popular
		 */
		set @bancoPopular = isnull(@salarioBruto, 0) * 0.01

		/* 
		 * Verifica si es miembro de la asosiacion
		 */
		if @estadoAsosiacion = 1
			set @asosiacion = isnull(@salarioBruto, 0) * 0.03
		else 
			set @asosiacion = 0

		/* 
		 * Calcular el salario Neto
		 */
		set @salarioNeto = isnull(@salarioBruto, 0) + isnull(@incapacidad, 0) 
							- (isnull(@ccss, 0) + isnull(@bancoPopular, 0)  + isnull(@asosiacion, 0));
		

		/*
			Ajustar fecha a jueves
		*/
		set @today =  GETDATE()

		print('Today is' + convert(varchar(12), @today))

		set @today = (case DATENAME(dw, @today)
					when 'Monday' then DATEADD(DAY, 3, @today)
					when 'Tuesday' then DATEADD(DAY, 2, @today)
					when 'Wednesday' then DATEADD(DAY, 1, @today)
					when 'Friday' then DATEADD(DAY, 6, @today)
					when 'Saturday' then DATEADD(DAY, 5, @today)
					when 'Sunday' then DATEADD(DAY, 4, @today)
				end)

		print('Today is tuestay' + convert(varchar(12), @today))

		insert into @resultadosTmp
		Values(@today, @salarioNeto, @incapacidad, @ccss, @bancoPopular,
			@asosiacion, @salarioBruto, @id_incapacidad)
		
		insert into Planilla_tmp
		values(@today, @salarioNeto, @incapacidad, @ccss, @bancoPopular, @asosiacion, @salarioBruto, @id_incapacidad, @id_usuario, 0)

		fetch next from CurEmpleado into
		@estadoAsosiacion, @salarioMensual, @incapacidad, @id_usuario, @estadoIncapacidad,@id_incapacidad
	end

	close CurEmpleado
	deallocate CurEmpleado
	
	select * from @resultadosTmp

GO
/****** Object:  StoredProcedure [dbo].[CrearSession]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[CrearSession]
	@id_user varchar(15),
	@pass varchar(50)
as
begin
	SELECT u.id_usuario, u.id_permiso, u.id_puesto, pu.id_departamento FROM Usuario u
	inner join Puesto pu on u.id_puesto = pu.id_puesto
	inner join Departamento dp on pu.id_departamento = dp.id_departamento
	WHERE id_usuario = @id_user AND password = @pass
end
GO
/****** Object:  StoredProcedure [dbo].[IncapacidadExp]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[IncapacidadExp]
	@id_usuario varchar(15)
as
begin
	print(@id_usuario)

	declare @today date = getdate(), @is date, @iI date, @fI date, @rest int

	select @iI = dia_inicio from Incapacidad where id_usuario = @id_usuario AND estado = 1
	select @fI = dia_final from Incapacidad where id_usuario = @id_usuario AND estado = 1

	print('today: ' + convert(varchar, @today))

	set @today = (case DATENAME(dw, @today)
					when 'Monday' then DATEADD(DAY, 3, @today)
					when 'Tuesday' then DATEADD(DAY, 2, @today)
					when 'Wednesday' then DATEADD(DAY, 1, @today)
					when 'Friday' then DATEADD(DAY, 6, @today)
					when 'Saturday' then DATEADD(DAY, 5, @today)
					when 'Sunday' then DATEADD(DAY, 4, @today)
				end)

	print('today Tueday: ' + convert(varchar, @today))

	set @is = DATEADD(DAY,-7,@today)

	print('Inicio semana: ' + convert(varchar, @is))
	print('Inicio Incapacidad: ' + convert(varchar, @iI))
	print('Fin Incapacidad: ' + convert(varchar, @fI))

	if DATEDIFF(day, @is, @iI) <= 0 begin -- si la incapacida comenzo antes del inicio de semana
		if DATEDIFF(day, @today, @fI) <= 0 begin -- si la incapacida finalia antes del fin de semana
			-- descativar incapacidad por expiracion
			update Incapacidad 
			set estado = 0
			where id_usuario = @id_usuario AND estado = 1
		end
	end
	else begin -- si la incapacida comenzo despues del inicio de semana
		if DATEDIFF(day, @today, @fI) <= 0 begin -- si la incapacida finalia antes del fin de semana
			-- descativar incapacidad por expiracion
			update Incapacidad 
			set estado = 0
			where id_usuario = @id_usuario AND estado = 1
		end
	end
end
GO
/****** Object:  StoredProcedure [dbo].[ingresarIncapacidad]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE procedure [dbo].[ingresarIncapacidad]
	@dia_inicio date,
	@dia_final date,
	@estado bit,
	@id_usuario varchar(15)
as
	declare @count int
begin
	select @count = COUNT(id_usuario) from Incapacidad where id_usuario = @id_usuario AND estado = 1
	if @count = 0 begin
		insert into Incapacidad
			values (@dia_inicio, @dia_final, @estado, @id_usuario, DATEDIFF(DAY ,@dia_inicio, @dia_final))
	end
	else begin
		update Incapacidad
			set estado = 0
			where id_usuario = @id_usuario

		insert into Incapacidad
			values (@dia_inicio, @dia_final, @estado, @id_usuario, DATEDIFF(DAY ,@dia_inicio, @dia_final))
	end
	
end
GO
/****** Object:  StoredProcedure [dbo].[InsertarContactos]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[InsertarContactos]
@Nombre varchar(15),
@Telefono varchar(10)
as
begin
insert into Contacto
values(@Nombre, @Telefono)
end

GO
/****** Object:  StoredProcedure [dbo].[InsertarDepartamento]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[InsertarDepartamento]
	@Nombre varchar(50)
as
begin
	insert into Departamento
	values(@Nombre)
end

GO
/****** Object:  StoredProcedure [dbo].[InsertarPuestos]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[InsertarPuestos]
	@nombre VARCHAR(50),
	@descripcion VARCHAR(300),
	@salario_min MONEY,
	@salario_max MONEY,
	@estudios BIT,
	@id_departamento INT
as
begin
	insert into Puesto
	values(@nombre, @descripcion, @salario_min, @salario_max, @estudios, @id_departamento)
end

GO
/****** Object:  StoredProcedure [dbo].[mantenimientoPlanilla]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[mantenimientoPlanilla]
	@type int,
	@id_usuario varchar(15) = null,
	@incapacidad money = null,
	@banco money = null,
	@ccss money = null,
	@estado bit = null
as
begin
	-- type = 1 -> update
	if @type = 1 begin
		update Planilla_tmp
		set incapacidad = ISNULL(@incapacidad, incapacidad),
			ccss = ISNULL(@ccss, ccss),
			banco = ISNULL(@banco, banco),
			status = ISNULL(@estado, status)
		where id_usuario = @id_usuario AND status = 0

		if @estado = 1 begin
			exec IncapacidadExp @id_usuario
		end
	end

	-- type = 2 -> aprobar
	if @type = 2 begin
		update Planilla_tmp
		set status = 1

	end

	delete Planilla_tmp 
	where status = 1
end
GO
/****** Object:  StoredProcedure [dbo].[MantenimientoUsuario]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[MantenimientoUsuario]
	@type int,
	@id_usuario varchar(15),
	@salario money,
	@asosiacion bit,
	@cuenta varchar(20),
	@id_puesto int, 
	@activo bit,
	@id_permiso int
as
begin
	--	update
	if @type = 1 begin
		update Usuario
		set salario = ISNULL(@salario, salario), 
			asosiacion = ISNULL(@asosiacion, asosiacion), 
			cuenta = ISNULL(@cuenta, cuenta), 
			id_puesto = ISNULL(@id_puesto, id_puesto), 
			activo = ISNULL(@activo, activo), 
			id_permiso = ISNULL(@id_permiso, id_permiso)
		where id_usuario = @id_usuario
	end
end
GO
/****** Object:  StoredProcedure [dbo].[MantenimietoPuesto]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[MantenimietoPuesto]
	@id_puesto int = null,
	@nombre varchar(50) = null,
	@descripcion varchar(300) = null,
	@sal_min money = null,
	@sal_max money = null,
	@estudios bit = null,
	@id_dep int = null
as
begin
	declare @count int

	select @count = COUNT(nombre) from Puesto where id_puesto = isnull(@id_puesto, 0)
	
	-- update puesto
	if @count = 1 begin
		update Puesto
		set nombre = isnull(@nombre, nombre),
			descripcion = isnull(@descripcion, descripcion),
			salario_min = isnull(@sal_min, salario_min),
			salario_max = isnull(@sal_max, salario_max),
			estudios = isnull(@estudios, estudios),
			id_departamento = isnull(@id_dep, id_departamento)
		where id_puesto = @id_puesto
	end
	-- nuevo puesto
	else begin
		insert into Puesto
			values(@nombre, @descripcion, @sal_min, @sal_max, @estudios, @id_dep)
	end
end
GO
/****** Object:  StoredProcedure [dbo].[MostrarDepartamento]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[MostrarDepartamento]
as
begin
	Select * from Departamento
end

GO
/****** Object:  StoredProcedure [dbo].[MostrarPlanillaHist]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[MostrarPlanillaHist]
as
begin
	select ph.fecha, ph.id_usuario, p.nombre as 'puesto', ph.salario_neto,
			ph.incapacidad, ph.ccss, ph.banco, ph.asosiacion, ph.salario_bruto,
			u.activo as 'estado_empl'
	from Planilla_hist ph
	inner join Usuario u on ph.id_usuario = u.id_usuario
	inner join Puesto p on u.id_puesto = p.id_puesto
end
GO
/****** Object:  StoredProcedure [dbo].[MostrarPlanillaHistID]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[MostrarPlanillaHistID]
	@id_user varchar(15)
as
begin  
	select ph.fecha, ph.id_usuario, p.nombre as 'puesto', ph.salario_neto,
				ph.incapacidad, ph.ccss, ph.banco, ph.asosiacion, ph.salario_bruto,
				u.activo as 'estado_empl'
		from Planilla_hist ph
		inner join Usuario u on ph.id_usuario = u.id_usuario
		inner join Puesto p on u.id_puesto = p.id_puesto
		where u.id_usuario = @id_user
end
GO
/****** Object:  StoredProcedure [dbo].[MostrarPlanillaTmp]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[MostrarPlanillaTmp]
as
begin
	select pl.*, pu.nombre as 'nombre_puesto' from Planilla_tmp pl
	inner join usuario u on pl.id_usuario = u.id_usuario
	inner join Puesto pu on u.id_puesto = pu.id_puesto
	where status = 0

end

GO
/****** Object:  StoredProcedure [dbo].[MostrarPlanillaTmpID]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[MostrarPlanillaTmpID]
	@id_user varchar(15)
as
begin
	select pl.*, pu.nombre as 'nombre_puesto' from Planilla_tmp pl
	inner join usuario u on pl.id_usuario = u.id_usuario
	inner join Puesto pu on u.id_puesto = pu.id_puesto
	where status = 0 and u.id_usuario = @id_user

end
GO
/****** Object:  StoredProcedure [dbo].[MostrarPuestos]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

-- =============================================
-- Author:		<William Romero Munoz>
-- Create date: <01/1/2021>
-- Description:	<Select a la tabla Puesto>
-- =============================================
CREATE procedure [dbo].[MostrarPuestos]
as
begin
	Select p.*, d.Nombre as 'nombre_depart' from Puesto p
	inner join Departamento d on p.id_departamento = d.id_departamento
end

GO
/****** Object:  StoredProcedure [dbo].[MostrarUsuarioTmp]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[MostrarUsuarioTmp]
	@id_usuario varchar(15)
as
begin
	select * from Usuario u
	inner join Planilla_tmp pl on u.id_usuario = pl.id_usuario
	where pl.status = 0 and u.id_usuario = @id_usuario
end
GO
/****** Object:  StoredProcedure [dbo].[nuevoEmpleado]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[nuevoEmpleado]
	@id varchar(15),
	@nombre varchar(50),
	@priApe varchar(50),
	@segApe varchar(50),
	@pass varchar(50),
	@nacionalidad varchar(50),
	@direccion varchar(300),
	@telefono varchar(15)
as
begin
	insert into Usuario (id_usuario,nombre,primer_apellido,segundo_apellido,
						password,nacionalidad,salario,direccion,telefono,
						fecha_ingreso,cuenta,activo)
	values(@id, @nombre,@priApe,@segApe,
		@pass,@nacionalidad,
		0,@direccion,@telefono,GETDATE(),
		'',1)

end
GO
/****** Object:  Trigger [dbo].[trg_movePlanillaTmpToHist]    Script Date: 2/16/2021 2:22:06 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

-- triggers

CREATE trigger [dbo].[trg_movePlanillaTmpToHist]
on [dbo].[Planilla_tmp]
after delete
as
	declare @id_us_dl varchar(15)
BEGIN
	insert into Planilla_hist(fecha, salario_neto, incapacidad, ccss, banco, asosiacion, salario_bruto, id_incapacidad, id_usuario)
		select dl.fecha, dl.salario_neto, dl.incapacidad, dl.ccss, dl.banco, dl.asosiacion, dl.salario_bruto, dl.id_incapacidad, dl.id_usuario
		from deleted dl
		where dl.status = 1

	
	select @id_us_dl = dl.id_usuario from deleted dl where dl.status = 1
	exec IncapacidadExp @id_us_dl
END
GO
USE [master]
GO
ALTER DATABASE [DB_Planilla] SET  READ_WRITE 
GO
