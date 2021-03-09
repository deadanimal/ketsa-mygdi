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
  /*{
    path: '/admin/management',
    title: 'Management',
    type: 'sub',
    icontype: 'fas fa-file-invoice text-purple',
    collapse: 'management',
    isCollapsed: true,
    children: [
      { path: 'audit-trails', title: 'Audit Trails', type: 'link' },
      { path: 'user', title: 'User', type: 'link' }
    ]
  },
  /*{
    path: '/admin/report',
    title: 'Reporting',
    type: 'link',
    icontype: 'fas fa-chart-bar text-red'
  },
  
  {
    path: '/helpdesk',
    title: 'Helpdesk',
    type: 'link',
    icontype: 'fas fa-life-ring text-blue'
  },
  {
    path: '/audit',
    title: 'Audit Trail',
    type: 'link',
    icontype: 'fas fa-braille text-indigo'
  }*/
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

export const ROUTESPENGESAH: RouteInfo[] = [
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
  /*{
    path: '/admin/management',
    title: 'Management',
    type: 'sub',
    icontype: 'fas fa-file-invoice text-purple',
    collapse: 'management',
    isCollapsed: true,
    children: [
      { path: 'audit-trails', title: 'Audit Trails', type: 'link' },
      { path: 'user', title: 'User', type: 'link' }
    ]
  },
  /*{
    path: '/admin/report',
    title: 'Reporting',
    type: 'link',
    icontype: 'fas fa-chart-bar text-red'
  },
  
  {
    path: '/helpdesk',
    title: 'Helpdesk',
    type: 'link',
    icontype: 'fas fa-life-ring text-blue'
  },
  {
    path: '/audit',
    title: 'Audit Trail',
    type: 'link',
    icontype: 'fas fa-braille text-indigo'
  }*/
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
      { path: 'update-element', title: 'Kemaskini Elemen Metadata', type: 'link' }
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
      { path: 'dataasas', title: 'Kemaskini Data', type: 'link' },
      { path: 'newapplication', title: 'Permohonan Baru', type: 'link' },
      { path: 'dataprocess', title: 'Proses Data', type: 'link' },
      { path: 'applicationstatus', title: 'Status Permohonan', type: 'link' },
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
      { path: 'userguide', title: 'Panduan Pengguna', type: 'link' },
      { path: 'disclaimer', title: 'Penafian', type: 'link' }
    ]
  },
  
  /*,
  {
    path: '/maintenance',
    title: 'Maintenance',
    type: 'link',
    icontype: 'fas fa-cogs text-orange'
  }*/
  /*{
    path: '/settings',
    title: 'Settings',
    type: 'link',
    icontype: 'fas fa-sliders-h text-blue'
  }*/
];