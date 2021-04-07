import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DatapriceComponent } from './dataprice.component';

describe('DatapriceComponent', () => {
  let component: DatapriceComponent;
  let fixture: ComponentFixture<DatapriceComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DatapriceComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DatapriceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
