export interface RouteInfo {
  path: string;
  title: string;
  type: string;
  icontype: string;
  collapse?: string;
  isCollapsed?: boolean;
  isCollapsed1?: boolean;
  isCollapsing?: any;
  children?: ChildrenItems[];
}

export interface ChildrenItems {
  path: string;
  title: string;
  type?: string;
  collapse?: string;
  children?: ChildrenItems2[];
  isCollapsed?: boolean;
}
export interface ChildrenItems2 {
  path?: string;
  title?: string;
  type?: string;
}

// Menu Items
export const ROUTESUSER: RouteInfo[] = [
  {
    path: '/portal/',
    title: 'Utama',
    type: 'link',
    icontype: 'fas fa-home text-teal'
  },
  {
    path: '/user/profile',
    title: 'Profil',
    type: 'link',
    icontype: 'fas fa-user text-blue'
  },
  {
    path: '/user/metadata',
    title: 'Pengisian Metadata',
    type: 'link',
    icontype: 'fas fa-edit text-pink'
  },
  {
    path: '/user/tabledata',
    title: 'Senarai Metadata',
    type: 'link',
    icontype: 'fas fa-list-ul text-indigo'
  },



];

export const ROUTESUSER2: RouteInfo[] = [
  {
    path: '/portal/',
    title: 'Utama',
    type: 'link',
    icontype: 'fas fa-home text-teal'
  },
  {
    path: '/user/profile',
    title: 'Profil',
    type: 'link',
    icontype: 'fas fa-user text-blue'
  },
  {
    path: '/user/dashboard',
    title: 'Dashboard',
    type: 'link',
    icontype: 'fas fa-desktop text-warning'
  },
  {
    path: '/user/semakan',
    title: 'Semakan Metadata',
    type: 'link',
    icontype: 'fas fa-edit text-pink'
  },
  {
    path: '/user/tabledata',
    title: 'Senarai Metadata',
    type: 'link',
    icontype: 'fas fa-list-ul text-indigo'
  },

];

export const ROUTESUSER3: RouteInfo[] = [
  {
    path: '/portal/',
    title: 'Utama',
    type: 'link',
    icontype: 'fas fa-home text-teal'
  },
  {
    path: '/user/profile',
    title: 'Profil',
    type: 'link',
    icontype: 'fas fa-user text-blue'
  },
  {
    path: '/user/dashboard',
    title: 'Dashboard',
    type: 'link',
    icontype: 'fas fa-desktop text-warning'
  },
  {
    path: '/user/tabledata',
    title: 'Senarai Metadata',
    type: 'link',
    icontype: 'fas fa-list-ul text-indigo'
  },
  {
    path: '/user/semakan',
    title: 'Status Permohonan',
    type: 'link',
    icontype: 'fas fa-edit text-pink'
  },

];

export const ROUTESADMIN: RouteInfo[] = [
  {
    path: '/portal/',
    title: 'Utama',
    type: 'link',
    icontype: 'fas fa-home text-teal'
  },
  {
    path: '/admin/profile',
    title: 'Profil',
    type: 'link',
    icontype: 'fas fa-user text-blue'
  },
  {
    path: '/admin/dashboard',
    title: 'Dashboard',
    type: 'link',
    icontype: 'fas fa-desktop text-warning'
  },
  {
    path: '/admin/management/user',
    title: 'Pengurusan Pengguna',
    type: 'link',
    icontype: 'fas fa-user-cog text-purple',
  },
  {
    path: '/admin/management/',
    title: 'Pengurusan Metadata',
    type: 'sub',
    icontype: 'fas fa-braille text-indigo',
    collapse: 'management',
    isCollapsed: true,
    children: [
      { path: 'tabledata', title: 'Senarai Metadata', type: 'link' },
      { path: 'update-element', title: 'Kemas Kini Elemen Metadata', type: 'link' }
    ]
  },
  {
    path: '/admin/management',
    title: 'Pengurusan Data Asas',
    type: 'sub',
    icontype: 'fas fa-tasks text-red',
    collapse: 'management',
    isCollapsed: true,
    children: [
      {
        path: 'dataasas', title: 'Kemas Kini Data', type: 'sub', collapse: 'update-data', isCollapsed: true,
        children: [
          { path: 'datalist', title: 'Senarai Data', type: 'link' },
          { path: 'class-category', title: 'Kategori Pengkelasan Data', type: 'link' },
          { path: 'class-sharecategory', title: 'Kategori Pengkelasan Perkongsian Data', type: 'link' },
          { path: 'dataprice', title: 'Harga Data', type: 'link' },
        ]
      },
      { path: 'newapplication', title: 'Permohonan Baru', type: 'link' },
      { path: 'applicationstatus', title: 'Status Permohonan', type: 'link' },
      { path: 'dataprocess', title: 'Proses Data', type: 'link' },
      { path: 'valuation', title: 'Penilaian', type: 'link' },
    ]
  },
  {
    path: '/admin/feedback',
    title: 'Maklum Balas',
    type: 'link',
    icontype: 'fas fa-comments text-primary'
  },
  {
    path: '/admin/management/',
    title: 'Pengurusan Portal',
    type: 'sub',
    icontype: 'fas fa-glasses text-green',
    collapse: 'management',
    isCollapsed: true,
    children: [
      { path: 'faq', title: 'Soalan Lazim', type: 'link' },
      { path: 'annoucement', title: 'Pengumuman', type: 'link' },
      { path: 'userguide', title: 'Panduan Pengguna', type: 'link' }
    ]
  },
];

export const ROUTESADMIN2: RouteInfo[] = [
  {
    path: '/portal/',
    title: 'Utama',
    type: 'link',
    icontype: 'fas fa-home text-teal'
  },
  {
    path: '/admin/profile',
    title: 'Profil',
    type: 'link',
    icontype: 'fas fa-user text-blue'
  },
  {
    path: '/admin/dashboard',
    title: 'Dashboard',
    type: 'link',
    icontype: 'fas fa-desktop text-warning'
  },
  {
    path: '/admin/management/tabledata',
    title: 'Senarai Metadata',
    type: 'link',
    icontype: 'fa fa-tasks text-indigo'
  },
  {
    path: '/admin/management/update-element',
    title: 'Kemas Kini Elemen Metadata',
    type: 'link',
    icontype: 'fas fa-cubes text-green'
  },
];

export const ROUTESADMIN3: RouteInfo[] = [
  {
    path: '/portal/',
    title: 'Utama',
    type: 'link',
    icontype: 'fas fa-home text-teal'
  },
  {
    path: '/admin/profile',
    title: 'Profil',
    type: 'link',
    icontype: 'fas fa-user text-blue'
  },
  {
    path: '/admin/dashboard',
    title: 'Dashboard',
    type: 'link',
    icontype: 'fas fa-desktop text-warning'
  },
  {
    path: '/admin/management/dataasas',
    title: 'Kemas Kini Data',
    type: 'sub',
    collapse: 'update-data',
    icontype: 'fas fa-mouse text-green',
    isCollapsed: true,
    children: [
      { path: 'datalist', title: 'Senarai Data', type: 'link' },
      { path: 'class-category', title: 'Kategori Pengkelasan Data', type: 'link' },
      { path: 'class-sharecategory', title: 'Kategori Pengkelasan Perkongsian Data', type: 'link' },
      { path: 'dataprice', title: 'Harga Data', type: 'link' },
    ]
  },
  {
    path: '/admin/management/newapplication',
    title: 'Permohonan Baru',
    type: 'link',
    icontype: 'far fa-id-card text-green'
  },
  {
    path: '/admin/management/applicationstatus',
    title: 'Status Permohonan',
    type: 'link',
    icontype: 'fas fa-book text-purple'
  },
  {
    path: '/admin/management/dataprocess',
    title: 'Proses Data',
    type: 'link',
    icontype: 'fas fa-sync-alt text-cyan'
  },
  {
    path: '/admin/management/valuation',
    title: 'Penilaian',
    type: 'link',
    icontype: 'fas fa-file-signature text-primary'
  },
];