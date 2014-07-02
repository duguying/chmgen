CREATE TABLE [file] (
[id] INTEGER  PRIMARY KEY NOT NULL,
[type] NUMERIC DEFAULT '0' NOT NULL,
[name] NVARCHAR(512)  UNIQUE NULL,
[f_declaration] TEXT  NULL,
[f_include] TEXT  NULL,
[f_function] TEXT  NULL,
[f_parms] TEXT  NULL,
[f_returns] TEXT  NULL,
[f_description] TEXT  NULL,
[f_warning] TEXT  NULL,
[f_demos] TEXT  NULL,
[p_content] TEXT  NULL
)

CREATE TABLE [relation] (
[id] INTEGER  NOT NULL PRIMARY KEY,
[father] INTEGER  NOT NULL,
[son] INTEGER  UNIQUE NOT NULL
)
