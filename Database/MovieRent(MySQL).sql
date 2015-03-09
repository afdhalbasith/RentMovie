/*==============================================================*/
/* Table: DETIL_PEMINJAMAN                                      */
/*==============================================================*/
create table DETIL_PEMINJAMAN 
(
   PID                  integer                        not null AUTO_INCREMENT,
   FID                  integer                        not null,
   DID                  integer                        not null,
   constraint PK_DETIL_PEMINJAMAN primary key(PID, FID, DID)
);


/*==============================================================*/
/* Table: FILM                                                  */
/*==============================================================*/
create table FILM 
(
   FID                  integer                        not null AUTO_INCREMENT,
   FNAMA                varchar(20)                    null,
   KATEGORI             varchar(20)                    null,
   SINOPSIS             varchar(200)                   null,
   HARGA                integer                        null,
   STATUSFL             varchar(20)                    null,
   constraint PK_FILM primary key (FID)
);


/*==============================================================*/
/* Table: MEREVIEW                                              */
/*==============================================================*/
create table MEREVIEW 
(
   RID                  integer                        not null AUTO_INCREMENT,
   UID                  integer                        not null,
   FID                  integer                        not null,
   REVIEW               varchar(200)                   null,
   NILAI                integer                        null,
   constraint PK_MEREVIEW primary key  (RID)
);

/*==============================================================*/
/* Table: PEMINJAMAN                                            */
/*==============================================================*/
create table PEMINJAMAN 
(
   PID                  integer                        not null AUTO_INCREMENT,
   UID                  integer                        not null,
   WAKTUPINJAM          date                           null,
   WAKTUKEMBALI         date                           null,
   PENGEMBALIAN         date                           null,
   TOTAL                integer                        null,
   DENDA                integer                        null,
   STATUSPJ             varchar(20)                    null,
   constraint PK_PEMINJAMAN primary key (PID)
);

/*==============================================================*/
/* Table: PENGGUNA                                              */
/*==============================================================*/
create table PENGGUNA 
(
   UID                  integer                        not null AUTO_INCREMENT,
   NAMA                 varchar(20)                    null,
   ALAMAT               varchar(20)                    null,
   NOHP                 numeric(20)                    null,
   USERNAME             varchar(20)                    null,
   PASSWORD             varchar(20)                    null,
   EMAIL                varchar(20)                    null,
   LEVEL                varchar(20)                    null,
   constraint PK_PENGGUNA primary key (UID)
);


alter table DETIL_PEMINJAMAN
   add constraint FK_DETIL_PE_MENGGUNAK_PEMINJAM foreign key (PID)
      references PEMINJAMAN (PID);

alter table DETIL_PEMINJAMAN
   add constraint FK_DETIL_PE_MENGGUNAK_FILM foreign key (FID)
      references FILM (FID);

alter table MEREVIEW
   add constraint FK_MEREVIEW_MEREVIEW_PENGGUNA foreign key (UID)
      references PENGGUNA (UID);

alter table MEREVIEW
   add constraint FK_MEREVIEW_MEREVIEW2_FILM foreign key (FID)
      references FILM (FID);

alter table PEMINJAMAN
   add constraint FK_PEMINJAM_MELAKUKAN_PENGGUNA foreign key (UID)
      references PENGGUNA (UID);
