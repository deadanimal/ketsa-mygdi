import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementAnnoucementComponent } from './management-annoucement.component';

describe('ManagementAnnoucementComponent', () => {
  let component: ManagementAnnoucementComponent;
  let fixture: ComponentFixture<ManagementAnnoucementComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementAnnoucementComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementAnnoucementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
