import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagementAcceptuserComponent } from './management-acceptuser.component';

describe('ManagementAcceptuserComponent', () => {
  let component: ManagementAcceptuserComponent;
  let fixture: ComponentFixture<ManagementAcceptuserComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagementAcceptuserComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ManagementAcceptuserComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
